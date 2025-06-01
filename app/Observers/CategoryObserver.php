<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{

    /**
     * Handle the Category "creating" event.
     *
     * @param Category $category
     * @return void
     */
    public function creating(Category $category): void
    {
        $category->slug = $this->generateNestedSlug($category);
    }

    /**
     * Generate a nested slug for the category (parent-slug/child-slug)
     *
     * @param Category $category
     * @return string
     */
    private function generateNestedSlug(Category $category): string
    {
        $slug = Str::slug($category->name);

        // If category has a parent, prepend parent's slug
        if ($category->parent_id) {
            $parentSlug = $category->parent->slug;
            $slug = "{$parentSlug}-{$slug}";
        }

        // Ensure slug is unique among siblings
        return $this->ensureUniqueSlug($slug, $category);
    }

    /**
     * Ensure the slug is unique among siblings
     *
     * @param string $slug
     * @param Category $category
     * @return string
     */
    private function ensureUniqueSlug(string $slug, Category $category): string
    {
        $originalSlug = $slug;
        $counter = 1;

        $query = Category::where('slug', $slug)
            ->where('id', '!=', $category->id ?? null);

        // For existing categories, exclude siblings with the same parent
        if ($category->exists) {
            $query->where('parent_id', $category->parent_id);
        }

        while ($query->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;

            $query = Category::where('slug', $slug)
                ->where('id', '!=', $category->id ?? null);

            if ($category->exists) {
                $query->where('parent_id', $category->parent_id);
            }
        }

        return $slug;
    }

    /**
     * Handle the Category "updating" event.
     *
     * @param Category $category
     * @return void
     */
    public function updating(Category $category): void
    {
        if ($category->isDirty('name') || $this->parentChanged($category)) {
            $category->slug = $this->generateNestedSlug($category);

            // If this category has children, we should update their slugs too
            if ($category->children->isNotEmpty()) {
                $this->updateChildrenSlugs($category);
            }
        }
    }

    /**
     * Check if parent was changed
     *
     * @param Category $category
     * @return bool
     */
    private function parentChanged(Category $category): bool
    {
        return $category->isDirty('parent_id');
    }

    /**
     * Update slugs for all children recursively
     *
     * @param Category $category
     * @return void
     */
    private function updateChildrenSlugs(Category $category): void
    {
        $category->load('children');

        foreach ($category->children as $child) {
            $child->slug = $this->generateNestedSlug($child);
            $child->save();

            if ($child->children->isNotEmpty()) {
                $this->updateChildrenSlugs($child);
            }
        }
    }
}
