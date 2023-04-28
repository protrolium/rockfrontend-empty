# RockFrontend Empty
## Site Profile for ProcessWire

Install into a directory called `site-rockfrontend-empty` in a new ProcessWire installation.

## Modules
Comes with the following modules pre-installed
- Rockfrontend
- Less
- TextformatterEmoji
- Duplicator
- ProcessWireUpgrade
- MarkupMetadata

## Light/Dark Modes
Comes with a light/dark mode javascript component

## Latte engine
Uses the follwoing structure for Pages / templates:
```
root
└── site
    └── assets
        ├── classes
        │   ├── DefaultPage.php
        │   └── HomePage.php
        ├── templates
        │   ├── home.php
        │   ├── default-page.php
        │   └── (etc)
        └── layouts
            ├── home.php
            ├── default.php (main rockfrontend renderer)
            └── sections
                ├── default-page.latte
                └── (etc)             
```
