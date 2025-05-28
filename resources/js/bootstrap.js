import axios from 'axios';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import resize from '@alpinejs/resize'


window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


document.addEventListener('alpine:init', () => {
    const getSystemPrefersDark = () =>
        window.matchMedia('(prefers-color-scheme: dark)').matches

    const getStoredTheme = () => localStorage.getItem('theme')
    const getDefaultTheme = () =>
        getComputedStyle(document.documentElement).getPropertyValue('--default-theme-mode')?.trim()

    const resolveTheme = () => {
        const savedTheme = getStoredTheme() ?? getDefaultTheme()
        if (savedTheme === 'dark') return 'dark'
        if (savedTheme === 'system') return getSystemPrefersDark() ? 'dark' : 'light'
        return 'light'
    }

    Alpine.store('theme', resolveTheme())

    window.addEventListener('theme-changed', (event) => {
        const userTheme = event.detail
        localStorage.setItem('theme', userTheme)
        const appliedTheme =
            userTheme === 'system' ? (getSystemPrefersDark() ? 'dark' : 'light') : userTheme
        Alpine.store('theme', appliedTheme)
    })

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (event) => {
        if (getStoredTheme() === 'system') {
            Alpine.store('theme', event.matches ? 'dark' : 'light')
        }
    })

    Alpine.effect(() => {
        const currentTheme = Alpine.store('theme')
        document.documentElement.classList.toggle('dark', currentTheme === 'dark')
        document.body.classList.toggle('dark', currentTheme === 'dark')
        document.body.classList.toggle('light', currentTheme === 'light')
    })

    Alpine.magic('cycleTheme', () => {
        return () => {
            const current = Alpine.store('theme')
            const next = current === 'light' ? 'dark' : current === 'dark' ? 'system' : 'light'
            const event = new CustomEvent('theme-changed', { detail: next })
            window.dispatchEvent(event)
        }
    })
})

Alpine.plugin(resize);
// Alpine.plugin(darkMode);
Livewire.start();
