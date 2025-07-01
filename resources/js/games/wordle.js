function wordleGame() {
    return {
        // Word list
        wordList: [
            "aback", "abase", "abate", "abbey", "abbot", "abhor", "abide", "abled", "abort", "about",
            "above", "abuse", "abyss", "acorn", "acrid", "actor", "acute", "adage", "adapt", "adept",
            "admin", "admit", "adobe", "adopt", "adore", "adorn", "adult", "affix", "afire", "afoot",
            "afoul", "after", "again", "agape", "agate", "agent", "agile", "aging", "aglow", "agony",
            "agree", "ahead", "aider", "aisle", "alarm", "album", "alert", "algae", "alibi", "alien",
            "align", "alike", "alive", "allay", "alley", "allot", "allow", "alloy", "aloft", "alone",
            "along", "aloof", "alpha", "altar", "alter", "amass", "amaze", "amber", "amble", "amend",
            "amiss", "among", "ample", "amply", "amuse", "angel", "anger", "angle", "angry", "angst",
            "anime", "ankle", "annex", "annul", "anode", "antic", "anvil", "aorta", "apart", "aphid",
            "aping", "apnea", "apple", "apply", "apron", "aptly", "arbor", "ardor", "arena", "arise",
            "armor", "aroma", "arose", "array", "arrow", "arson", "artsy", "ascot", "ashen", "aside",
            "askew", "assay", "asset", "atoll", "atone", "attic", "audio", "audit", "augur", "aunty",
            "avail", "avert", "avian", "avoid", "await", "awake", "award", "aware", "awash", "awful",
            "awoke", "axial", "axiom", "axion", "azure", "bacon", "badge", "badly", "bagel", "baggy",
            "baker", "balmy", "banal", "banjo", "barge", "baron", "basal", "basic", "basil", "basin",
            "basis", "baste", "batch", "bathe", "baton", "batty", "bawdy", "bayou", "beach", "beady",
            "beard", "beast", "beech", "beefy", "befit", "began", "begat", "beget", "begin", "begun",
            "being", "belch", "belle", "belly", "below", "bench", "beret", "berry", "berth", "beset",
            "betel", "bevel", "bezel", "bible", "bicep", "biddy", "bigot", "bilge", "billy", "binge",
            "bingo", "birch", "birth", "bison", "bitty", "black", "blade", "blame", "bland", "blank",
            "blare", "blast", "blaze", "bleak", "bleat", "bleed", "bleep", "blend", "bless", "blimp",
            "blind", "blink", "bliss", "blitz", "bloat", "block", "bloke", "blond", "blood", "bloom",
            "blown", "bluer", "bluff", "blunt", "blurb", "blurt", "blush", "board", "boast", "bobby",
            "bongo", "bonus", "booby", "boost", "booth", "booty", "booze", "boozy", "borax", "borne",
            "bossy", "botch", "bough", "bound", "bowel", "boxer", "brace", "braid", "brain", "brake",
            "brand", "brash", "brass", "brave", "bravo", "brawl", "brawn", "bread", "break", "breed",
            "briar", "bribe", "brick", "bride", "brief", "brine", "bring", "brink", "briny", "brisk",
            "broad", "broil", "broke", "brood", "brook", "broom", "broth", "brown", "brunt", "brush",
            "brute", "buddy", "budge", "buggy", "bugle", "build", "built", "bulge", "bulky", "bully",
            "bunch", "bunny", "burly", "burnt", "burst", "bused", "bushy", "butch", "butte", "buyer",
            "buzzy", "bylaw", "cabal", "cabin", "cable", "cacao", "cache", "cacti", "caddy", "cadet",
            "cagey", "cairn", "camel", "cameo", "canal", "candy", "canny", "canoe", "caper", "carat",
            "cargo", "carol", "carry", "carve", "caste", "catch", "cater", "catty", "caulk", "cause",
            "cavil", "cease", "cedar", "cello", "chafe", "chaff", "chain", "chair", "chalk", "champ",
            "chant", "chaos", "chard", "charm", "chart", "chase", "chasm", "cheap", "cheat", "check",
            "cheek", "cheer", "chess", "chest", "chick", "chide", "chief", "child", "chili", "chill",
            "chime", "china", "chirp", "chock", "choir", "choke", "chord", "chore", "chose", "chuck",
            "chump", "chunk", "churn", "chute", "cider", "cigar", "cinch", "circa", "civic", "civil",
            "clack", "claim", "clamp", "clang", "clash", "clasp", "class", "clean", "clear", "cleat",
            "clerk", "click", "cliff", "climb", "cling", "clink", "cloak", "clock", "clone", "close",
            "cloth", "cloud", "clout", "clove", "clown", "cluck", "clued", "clump", "clung", "coach",
            "coast", "cobra", "cocoa", "colon", "color", "comet", "comfy", "comic", "comma", "conch",
            "condo", "conic", "coral", "corer", "corny", "couch", "cough", "could", "count", "coupe",
            "court", "coven", "cover", "covet", "covey", "cower", "coyly", "crack", "craft", "cramp",
            "crane", "crank", "crash", "crass", "crate", "crave", "crawl", "craze", "crazy", "creak",
            "cream", "credo", "creed", "creek", "creep", "creme", "crepe", "crept", "cress", "crest",
            "crick", "cried", "crier", "crime", "crimp", "crisp", "croak", "crock", "crone", "crony",
            "crook", "cross", "croup", "crowd", "crown", "crude", "cruel", "crumb", "crump", "crush",
            "crust", "crypt", "cubic", "cumin", "curly", "curry", "curse", "curve", "curvy", "cutie",
            "cyber", "cycle", "cynic", "daddy", "daily", "dairy", "daisy", "dally", "dance", "dandy",
            "daunt", "dealt", "death", "debar", "debug", "debut", "decal", "decay", "decor", "decoy",
            "defer", "deign", "deity", "delay", "delta", "delve", "demon", "demur", "denim", "dense",
            "depot", "depth", "derby", "deter", "detox", "deuce", "devil", "diary", "dicey", "digit",
            "dimly", "diner", "dingo", "dingy", "dirty", "disco", "ditch", "ditto", "ditty", "diver",
            "dizzy", "dodge", "dodgy", "dogma", "doing", "dolly", "donor", "dopey", "doubt", "dough",
            "dowdy", "dowel", "downy", "dowry", "dozen", "draft", "drain", "drake", "drama", "drank",
            "drape", "drawl", "drawn", "dread", "dream", "dress", "dried", "drier", "drift", "drill",
            "drink", "drive", "droid", "droit", "droll", "drone", "drool", "droop", "dross", "drove",
            "drown", "druid", "drunk", "dryer", "dryly", "duchy", "dully", "dummy", "dumpy", "dunce",
            "dusky", "dusty", "dutch", "duvet", "dwarf", "dwell", "dwelt", "dying", "eager", "eagle",
            "early", "earth", "easel", "eaten", "eater", "ebony", "eclat", "edict", "edify", "eight",
            "eject", "eking", "elate", "elbow", "elder", "elect", "elegy", "elfin", "elide", "elite",
            "elope", "elude", "email", "embed", "ember", "emcee", "empty", "enact", "endow", "enema",
            "enemy", "enjoy", "ennui", "ensue", "enter", "entry", "envoy", "epoch", "epoxy", "equal",
            "equip", "erase", "erect", "erode", "error", "erupt", "essay", "ester", "ether", "ethic",
            "ethos", "etude", "evade", "event", "every", "evict", "evoke", "exact", "exalt", "excel",
            "exert", "exile", "exist", "expel", "extol", "extra", "exult", "fable", "facet", "faint",
            "fairy", "faith", "false", "fancy", "fanny", "farce", "fatal", "fatty", "fault", "fauna",
            "favor", "feast", "fecal", "feign", "fella", "felon", "femme", "femur", "fence", "feral",
            "ferry", "fetal", "fetch", "fetid", "fetus", "fever", "fiber", "fibre", "ficus", "field",
            "fiend", "fiery", "fifth", "fifty", "fight", "filer", "filly", "filmy", "filth", "final",
            "finch", "finer", "first", "fishy", "fixer", "fizzy", "fjord", "flack", "flail", "flair",
            "flake", "flaky", "flame", "flank", "flare", "flash", "flask", "fleck", "fleet", "flesh",
            "flick", "flier", "fling", "flint", "flirt", "float", "flock", "flood", "floor", "flora",
            "floss", "flour", "flout", "flown", "fluff", "fluid", "fluke", "flume", "flung", "flunk",
            "flush", "flute", "flyer", "foamy", "focal", "focus", "foggy", "foist", "folio", "folly",
            "foray", "force", "forge", "forgo", "forte", "forth", "forty", "forum", "found", "foyer",
            "frail", "frame", "frank", "fraud", "freak", "freed", "freer", "fresh", "friar", "fried",
            "frill", "frisk", "fritz", "frock", "frond", "front", "frost", "froth", "frown", "froze",
            "fruit", "fudge", "fugue", "fully", "fungi", "funky", "funny", "furor", "furry", "fussy",
            "fuzzy", "gaffe", "gaily", "gains", "gamma", "gamut", "gauge", "gaunt", "gauze", "gawky",
            "gayly", "gazer", "gecko", "geeky", "geese", "genie", "genre", "ghost", "ghoul", "giant",
            "giddy", "girly", "girth", "given", "giver", "glade", "gland", "glare", "glass", "glaze",
            "gleam", "glean", "glide", "glint", "gloat", "globe", "gloom", "glory", "gloss", "glove",
            "glyph", "gnash", "gnome", "godly", "going", "golem", "golly", "gonad", "goner", "goody",
            "gooey", "goofy", "goose", "gorge", "gouge", "gourd", "grace", "grade", "graft", "grail",
            "grain", "grand", "grant", "grape", "graph", "grasp", "grass", "grate", "grave", "gravy",
            "graze", "great", "greed", "green", "greet", "grief", "grill", "grime", "grimy", "grind",
            "gripe", "groan", "groin", "groom", "grope", "gross", "group", "grove", "growl", "grown",
            "gruel", "gruff", "grunt", "guard", "guava", "guess", "guest", "guide", "guild", "guile",
            "guilt", "guise", "gully", "gumbo", "guppy", "gusto", "gusty", "gypsy", "habit", "hairy",
            "halve", "handy", "happy", "hardy", "harem", "harpy", "harry", "harsh", "haste", "hasty",
            "hatch", "hater", "haunt", "haute", "haven", "havoc", "hazel", "heady", "heard", "heart",
            "heath", "heave", "heavy", "hedge", "hefty", "heist", "helix", "hello", "hence", "heron",
            "hinge", "hippo", "hippy", "hitch", "hoard", "hobby", "hoist", "holly", "homer", "honey",
            "honor", "horde", "horny", "horse", "hotel", "hotly", "hound", "house", "hovel", "hover",
            "howdy", "human", "humid", "humor", "humph", "humus", "hunch", "hunky", "hurry", "husky",
            "hussy", "hutch", "hydro", "hyena", "hymen", "hyper", "icily", "icing", "ideal", "idiom",
            "idiot", "idler", "idyll", "igloo", "image", "imbue", "impel", "imply", "inane", "inbox",
            "incur", "index", "inept", "inert", "infer", "ingot", "inlet", "inner", "input", "inter",
            "intro", "ionic", "irate", "irony", "islet", "issue", "itchy", "ivory", "jaunt", "jazzy",
            "jelly", "jerky", "jetty", "jewel", "jiffy", "joint", "joist", "joker", "jolly", "joust",
            "judge", "juice", "juicy", "jumbo", "jumpy", "junta", "junto", "karma", "kayak", "kebab",
            "khaki", "kinky", "kiosk", "kitty", "knack", "knead", "kneed", "kneel", "knife", "knock",
            "knoll", "known", "koala", "krill", "label", "labor", "laden", "ladle", "lager", "lance",
            "lanky", "lapel", "lapse", "large", "larva", "lasso", "latch", "later", "latex", "lathe",
            "latte", "laugh", "layer", "leach", "leafy", "leant", "leapt", "learn", "lease", "leash",
            "least", "leave", "ledge", "leech", "leery", "lefty", "legal", "leggy", "lemur", "lemon",
            "lemur", "leper", "level", "lever", "libel", "liege", "light", "liken", "lilac", "limbo",
            "limit", "linen", "liner", "lingo", "lipid", "lithe", "liver", "livid", "llama", "lobby",
            "local", "logic", "login", "loamy", "loath", "lobby", "local", "lodge", "logic", "login",
            "loopy", "loose", "lorry", "loser", "louse", "lousy", "lover", "lower", "lowly", "loyal",
            "lucid", "lucky", "lunar", "lunch", "lunge", "lupus", "lurch", "lurid", "lusty", "lying",
            "lymph", "lynch", "lyric", "macro", "madam", "madly", "mafia", "magic", "magma", "maize",
            "major", "maker", "mambo", "mamma", "mammy", "manga", "mange", "mango", "mangy", "mania",
            "manic", "manly", "manor", "maple", "march", "marry", "marsh", "mason", "masse", "match",
            "matey", "mauve", "maxim", "maybe", "mayor", "mealy", "meant", "mecca", "medal", "media",
            "medic", "melee", "melon", "mercy", "merge", "merit", "merry", "metal", "meter", "metro",
            "micro", "midge", "midst", "might", "milky", "mimic", "mince", "miner", "minim", "minor",
            "minty", "minus", "mirth", "miser", "missy", "mocha", "modal", "model", "moist", "molar",
            "moldy", "money", "month", "moody", "moose", "moral", "moron", "morph", "mossy", "motel",
            "motif", "motor", "motto", "moult", "mound", "mount", "mourn", "mouse", "mouth", "mover",
            "movie", "mower", "mucky", "mucus", "muddy", "mulch", "mummy", "munch", "mural", "murky",
            "mushy", "music", "musky", "musty", "myrrh", "nadir", "naive", "nanny", "nasal", "nasty",
            "natal", "naval", "navel", "needy", "neigh", "nerve", "never", "newer", "newly", "nicer",
            "niche", "niece", "night", "ninja", "ninny", "ninth", "noble", "nobly", "noise", "noisy",
            "nomad", "noose", "north", "notch", "novel", "nurse", "nutty", "nylon", "nymph", "oaken",
            "obese", "occur", "ocean", "octal", "octet", "odder", "offal", "offer", "often", "olden",
            "older", "olive", "ombre", "omega", "onion", "onset", "opera", "opine", "opium", "optic",
            "orbit", "order", "organ", "other", "otter", "ought", "ounce", "outdo", "outer", "outgo",
            "ovary", "ovate", "overt", "ovine", "ovoid", "owing", "owner", "oxide", "ozone", "paddy",
            "pagan", "paint", "paler", "palsy", "panel", "panic", "pansy", "papal", "paper", "parer",
            "parka", "parry", "parse", "party", "pasta", "paste", "pasty", "patch", "patio", "patsy",
            "patty", "pause", "payee", "payer", "peace", "peach", "pearl", "pecan", "pedal", "penal",
            "pence", "penne", "penny", "perch", "peril", "perky", "pesto", "petal", "petty", "phase",
            "phone", "phony", "photo", "piano", "picky", "piece", "piety", "piggy", "pilot", "pinch",
            "piney", "pinky", "pinto", "piper", "pithy", "pivot", "pixel", "pixie", "pizza", "place",
            "plaid", "plain", "plait", "plane", "plank", "plant", "plate", "plaza", "plead", "pleat",
            "plied", "plier", "pluck", "plumb", "plume", "plump", "plunk", "plush", "poesy", "point",
            "poise", "poker", "polar", "polka", "polyp", "pooch", "poppy", "porch", "poser", "posit",
            "posse", "pouch", "pound", "pouty", "power", "prank", "prawn", "preen", "press", "price",
            "prick", "pride", "pried", "prime", "primo", "print", "prior", "prism", "privy", "prize",
            "probe", "prone", "prong", "proof", "prose", "proud", "prove", "prowl", "proxy", "prude",
            "prune", "psalm", "pubic", "pudgy", "puffy", "pulpy", "pulse", "punch", "pupil", "puppy",
            "puree", "purer", "purge", "purse", "pushy", "putty", "pygmy", "quack", "quail", "qualm",
            "quark", "quart", "quash", "quasi", "queen", "queer", "quell", "query", "quest", "queue",
            "quick", "quiet", "quill", "quilt", "quirk", "quite", "quota", "quote", "quoth", "rabbi",
            "rabid", "racer", "radar", "radii", "radio", "rainy", "raise", "rajah", "rally", "ralph",
            "ramen", "ranch", "randy", "range", "rapid", "rarer", "raspy", "ratio", "ratty", "raven",
            "rayon", "razor", "reach", "react", "ready", "realm", "rearm", "rebar", "rebel", "rebus",
            "rebut", "recap", "recur", "recut", "reedy", "refer", "refit", "regal", "reign", "relay",
            "relic", "remit", "renal", "renew", "repay", "repel", "reply", "rerun", "reset", "resin",
            "retro", "retry", "reuse", "revel", "revue", "rhino", "rhyme", "rider", "ridge", "rifle",
            "right", "rigid", "rigor", "rinse", "ripen", "riper", "risen", "riser", "risky", "rival",
            "river", "rivet", "roach", "roast", "robin", "robot", "rocky", "rodeo", "roger", "rogue",
            "roomy", "roost", "rotor", "rouge", "rough", "round", "rouse", "route", "rover", "rowdy",
            "royal", "ruddy", "ruder", "rugby", "ruler", "rumba", "rumor", "rupee", "rural", "rusty",
            "sadly", "safer", "saint", "salad", "sally", "salon", "salsa", "salty", "salve", "salvo",
            "sandy", "saner", "sappy", "sassy", "satin", "satyr", "sauce", "saucy", "sauna", "saute",
            "savoy", "savvy", "scald", "scale", "scalp", "scaly", "scamp", "scant", "scare", "scarf",
            "scary", "scene", "scent", "scion", "scoff", "scold", "scone", "scoop", "scope", "score",
            "scorn", "scour", "scout", "scowl", "scram", "scrap", "scree", "screw", "scrub", "scrum",
            "scuba", "sedan", "seedy", "segue", "seize", "semen", "sense", "sepia", "serif", "serum",
            "serve", "setup", "seven", "sever", "sewer", "shack", "shade", "shady", "shaft", "shake",
            "shaky", "shale", "shall", "shalt", "shame", "shank", "shape", "shard", "share", "shark",
            "sharp", "shave", "shawl", "shear", "sheen", "sheep", "sheer", "sheet", "sheik", "shelf",
            "shell", "shine", "shiny", "shirt", "shoal", "shock", "shone", "shook", "shoot", "shore",
            "shorn", "short", "shout", "shove", "shown", "showy", "shrew", "shrub", "shrug", "shuck",
            "shunt", "shush", "shyly", "siege", "sieve", "sight", "sigma", "silky", "silly", "since",
            "sinew", "singe", "siren", "sissy", "sixth", "sixty", "skate", "skier", "skiff", "skill",
            "skimp", "skirt", "skull", "skulk", "skunk", "slack", "slain", "slang", "slant", "slash",
            "slate", "slave", "sleek", "sleep", "sleet", "slept", "slice", "slick", "slide", "slime",
            "slimy", "sling", "slink", "slosh", "sloth", "slump", "slung", "slunk", "slurp", "slush",
            "slyly", "smack", "small", "smart", "smash", "smear", "smell", "smelt", "smile", "smirk",
            "smite", "smith", "smock", "smoke", "smoky", "smote", "snack", "snail", "snake", "snaky",
            "snare", "snarl", "sneak", "sneer", "snide", "sniff", "snipe", "snoop", "snore", "snort",
            "snout", "snowy", "snuck", "snuff", "soapy", "sober", "soggy", "solar", "solid", "solve",
            "sonar", "sonic", "sooth", "sooty", "sorry", "sound", "south", "sower", "space", "spade",
            "spare", "spark", "spasm", "spawn", "speak", "spear", "speck", "speed", "spell", "spelt",
            "spend", "spent", "sperm", "spice", "spicy", "spied", "spiel", "spike", "spiky", "spill",
            "spine", "spiny", "spire", "spite", "splat", "split", "spoil", "spoke", "spoof", "spook",
            "spool", "spoon", "spore", "sport", "spout", "spray", "spree", "sprig", "spunk", "spurn",
            "spurt", "squad", "squat", "squib", "stack", "staff", "stage", "staid", "stain", "stair",
            "stake", "stale", "stalk", "stall", "stamp", "stand", "stank", "stare", "stark", "start",
            "stash", "state", "stave", "stead", "steak", "steal", "steam", "steed", "steel", "steep",
            "steer", "stein", "stern", "stick", "stiff", "still", "stilt", "sting", "stink", "stint",
            "stock", "stoic", "stoke", "stole", "stomp", "stone", "stony", "stood", "stool", "stoop",
            "store", "stork", "storm", "story", "stout", "stove", "strap", "straw", "stray", "strip",
            "strut", "stuck", "study", "stuff", "stump", "stung", "stunk", "stunt", "style", "suave",
            "sugar", "suing", "suite", "sulky", "sully", "sumac", "sunny", "super", "surer", "surge",
            "surly", "sushi", "swami", "swamp", "swarm", "swash", "swath", "swear", "sweat", "sweep",
            "sweet", "swell", "swept", "swift", "swill", "swing", "swish", "swoon", "swoop", "sword",
            "swore", "sworn", "swung", "synod", "syrup", "tabby", "table", "taboo", "tacit", "tacky",
            "taffy", "taint", "taken", "taker", "tally", "talon", "tamer", "tango", "tangy", "taper",
            "tapir", "tardy", "tarot", "taste", "tasty", "tatty", "taunt", "tawny", "teach", "teary",
            "tease", "teddy", "teeth", "tempo", "tenet", "tenor", "tense", "tenth", "tepee", "tepid",
            "terra", "terse", "testy", "thank", "theft", "their", "theme", "there", "these", "theta",
            "thick", "thief", "thigh", "thing", "think", "third", "thong", "thorn", "those", "three",
            "threw", "throb", "throw", "thumb", "thump", "thyme", "tiara", "tibia", "tidal", "tiger",
            "tight", "tilde", "timer", "timid", "tipsy", "titan", "tithe", "title", "toast", "today",
            "toddy", "token", "tonal", "tonga", "tonic", "tooth", "topaz", "topic", "torch", "torso",
            "torus", "total", "totem", "touch", "tough", "towel", "tower", "toxic", "toxin", "trace",
            "track", "tract", "trade", "trail", "train", "trait", "tramp", "trash", "trawl", "tread",
            "treat", "trend", "triad", "trial", "tribe", "trice", "trick", "tried", "tripe", "trite",
            "troll", "troop", "trope", "trout", "trove", "truce", "truck", "truer", "truly", "trump",
            "trunk", "truss", "trust", "truth", "tryst", "tubal", "tuber", "tulip", "tulle", "tumor",
            "tunic", "turbo", "tutor", "twang", "tweak", "tweed", "twice", "twine", "twirl", "twist",
            "twixt", "udder", "ulcer", "ultra", "umbra", "uncle", "uncut", "under", "undid", "undue",
            "unfed", "unfit", "unify", "union", "unite", "unity", "unlit", "unmet", "unset", "untie",
            "until", "unwed", "unzip", "upper", "upset", "urban", "urine", "usage", "usher", "using",
            "usual", "usurp", "utile", "utter", "vague", "valet", "valid", "valor", "value", "valve",
            "vapor", "vault", "vaunt", "vegan", "venom", "venue", "verge", "verse", "verso", "verve",
            "vicar", "video", "vigil", "vigor", "villa", "vinyl", "viola", "viper", "viral", "virus",
            "visit", "visor", "vista", "vital", "vivid", "vixen", "vocal", "vodka", "vogue", "voice",
        ],

        // Game state
        targetWord: '',
        guesses: [],
        currentGuess: '',
        gameStatus: 'playing', // 'playing', 'won', 'lost'
        currentRow: 0,

        // Keyboard layout
        keyboardRows: [
            ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
            ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L'],
            ['ENTER', 'Z', 'X', 'C', 'V', 'B', 'N', 'M', 'BACKSPACE']
        ],

        // Toast notification
        toast: {
            show: false,
            message: '',
            type: 'success' // 'success' or 'error'
        },

        init() {
            this.resetGame();
        },

        resetGame() {
            this.targetWord = this.wordList[Math.floor(Math.random() * this.wordList.length)];
            this.guesses = [];
            this.currentGuess = '';
            this.gameStatus = 'playing';
            this.currentRow = 0;
            console.log('Target word:', this.targetWord); // For debugging
        },

        getCellLetter(rowIndex, colIndex) {
            if (rowIndex < this.guesses.length) {
                return this.guesses[rowIndex][colIndex] || '';
            } else if (rowIndex === this.currentRow) {
                return this.currentGuess[colIndex] || '';
            }
            return '';
        },

        getCellClass(rowIndex, colIndex) {
            const letter = this.getCellLetter(rowIndex, colIndex);

            if (rowIndex < this.guesses.length && letter) {
                const letterState = this.getLetterState(letter, colIndex, this.guesses[rowIndex]);
                return this.getStateClass(letterState) + ' border-2';
            } else if (letter) {
                return 'border-2 border-gray-400 bg-white';
            }
            return 'border-2 border-gray-300 bg-white';
        },

        getLetterState(letter, position, word) {
            if (word[position] === this.targetWord[position]) {
                return 'correct';
            }
            if (this.targetWord.includes(letter)) {
                return 'present';
            }
            return 'absent';
        },

        getStateClass(state) {
            switch (state) {
                case 'correct':
                    return 'bg-green-500 border-green-500 text-white';
                case 'present':
                    return 'bg-yellow-500 border-yellow-500 text-white';
                case 'absent':
                    return 'bg-gray-500 border-gray-500 text-white';
                default:
                    return 'border-gray-300 bg-white';
            }
        },

        getKeyboardLetterState(letter) {
            let state = 'empty';

            for (const guess of this.guesses) {
                for (let i = 0; i < guess.length; i++) {
                    if (guess[i] === letter) {
                        const letterState = this.getLetterState(letter, i, guess);
                        if (letterState === 'correct') {
                            return 'correct';
                        }
                        if (letterState === 'present' && state !== 'correct') {
                            state = 'present';
                        }
                        if (letterState === 'absent' && state === 'empty') {
                            state = 'absent';
                        }
                    }
                }
            }

            return state;
        },

        getKeyClass(key) {
            const isSpecial = key === 'ENTER' || key === 'BACKSPACE';
            let baseClass = isSpecial ? 'px-3' : 'w-10';

            if (key.length === 1) {
                const letterState = this.getKeyboardLetterState(key);
                switch (letterState) {
                    case 'correct':
                        return baseClass + ' bg-green-500 border-green-500 text-white hover:bg-green-600';
                    case 'present':
                        return baseClass + ' bg-yellow-500 border-yellow-500 text-white hover:bg-yellow-600';
                    case 'absent':
                        return baseClass + ' bg-gray-500 border-gray-500 text-white hover:bg-gray-600';
                    default:
                        return baseClass + ' bg-gray-200 hover:bg-gray-300 border border-gray-300';
                }
            }

            return baseClass + ' bg-gray-200 hover:bg-gray-300 border border-gray-300';
        },

        showToast(message, type = 'success') {
            this.toast = {
                show: true,
                message: message,
                type: type
            };

            setTimeout(() => {
                this.toast.show = false;
            }, 3000);
        },

        handleKeyPress(key) {
            if (this.gameStatus !== 'playing') return;

            if (key === 'ENTER') {
                if (this.currentGuess.length !== 5) {
                    this.showToast('Not enough letters', 'error');
                    return;
                }

                if (!this.wordList.includes(this.currentGuess)) {
                    this.showToast('Invalid word', 'error');
                    return;
                }

                this.guesses.push(this.currentGuess);
                const isCorrect = this.currentGuess === this.targetWord;
                const isGameOver = this.guesses.length >= 6;

                this.currentGuess = '';
                this.currentRow++;

                if (isCorrect) {
                    this.gameStatus = 'won';
                    this.showToast(`Congratulations! You guessed it in ${this.guesses.length} ${this.guesses.length === 1 ? 'try' : 'tries'}!`);
                } else if (isGameOver) {
                    this.gameStatus = 'lost';
                    this.showToast(`Game Over! The word was: ${this.targetWord}`, 'error');
                }
            } else if (key === 'BACKSPACE') {
                this.currentGuess = this.currentGuess.slice(0, -1);
            } else if (key.length === 1 && key.match(/[A-Z]/)) {
                if (this.currentGuess.length < 5) {
                    this.currentGuess += key;
                }
            }
        },

        handleKeyDown(event) {
            const key = event.key.toUpperCase();
            if (key === 'ENTER' || key === 'BACKSPACE' || (key.length === 1 && key.match(/[A-Z]/))) {
                event.preventDefault();
                this.handleKeyPress(key);
            }
        }
    }
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('wordleGame', wordleGame)
})
