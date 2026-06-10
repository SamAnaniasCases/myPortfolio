---
name: Sam Cases Portfolio Design System
description: Visual system for Sam Cases' personal web developer portfolio
colors:
  primary: "#f2850d"       # Amber orange
  primary-dark: "#fc931e"  # Dark mode orange
  neutral-bg: "#faf6ed"    # Warm cream
  neutral-bg-dark: "#181613" # Charcoal warm brown
  neutral-text: "#5c5345"  # Muted brown
  neutral-title: "#3d372e" # Dark warm title
  border: "#cdbda4"        # Border tan
  border-dark: "#46433c"   # Dark mode border
  shadow: "rgba(61, 48, 15, 0.2)"
  shadow-dark: "rgba(2, 2, 2, 0.6)"
typography:
  display:
    fontFamily: "'Montserrat Alternates', sans-serif"
    fontSize: "5.5rem"
    fontWeight: 700
  body:
    fontFamily: "'Jost', sans-serif"
    fontSize: "1rem"
    fontWeight: 500
rounded:
  sm: "8px"
  md: "15px"               # Dice corners
  lg: "32px"               # Buttons/inputs
spacing:
  xs: "4px"
  sm: "8px"
  md: "16px"
  lg: "32px"
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.neutral-bg}"
    rounded: "{rounded.lg}"
    padding: "1rem 2rem"
  dice-face:
    backgroundColor: "#ffffff"
    rounded: "{rounded.md}"
    border: "2px solid rgba(255, 255, 255, 0.4)"
---

# Design System: Sam Cases Portfolio

## 1. Overview

**Creative North Star: "The Tactile Craftsman"**

The visual language of the portfolio is anchored in a playful, minimalist, and highly tactile aesthetic. It combines the structured layout of clean grids with physical, interactive elements (like the rolling 3D dice) that respond to user feedback in a delightful way. The interface balances high-density information with generous breathing room, using clear typographic hierarchy and distinct boundary strokes.

**Key Characteristics:**
- **Tactile feedback:** Interactive elements feel heavy, physical, and bounce with realistic deceleration.
- **Warm contrast:** A curated color scheme of warm charcoal browns, light amber orange, and soft cream backgrounds that adapt perfectly to dark mode.
- **Clean geometric boundaries:** Crisp, solid 2px borders establish structure and avoid soft "ghost card" SaaS clichés.

## 2. Colors

The color palette uses warm-toned amber orange as its primary brand accent, paired with soft charcoal-brown neutrals for text, containers, and borders.

### Primary
- **Amber Orange** (#f2850d / oklch(66% 0.21 48)): Used for highlights, active navigation underlines, brand accents, and main text links.
- **Vibrant Orange Dark** (#fc931e): The dark mode counterpart, adjusted for visibility and optimal contrast against deep backgrounds.

### Neutral
- **Warm Cream Background** (#faf6ed): The primary light mode body background.
- **Soft White Container** (#fefdfb): Used for cards, navigation headers, and elements needing elevation in light mode.
- **Charcoal Dark Background** (#181613): The primary dark mode body background.
- **Muted Charcoal Container** (#22201b): Dark mode container background.
- **Tan Border** (#cdbda4): Standard border color for light mode elements.
- **Charcoal Border** (#46433c): Standard border color for dark mode elements.

### Named Rules
**The Contrast Preservation Rule.** The primary body text color must hit ≥4.5:1 contrast ratio against the container background in both light and dark mode. Never use thin, low-contrast gray text on cream or charcoal surfaces.
**The Dynamic Hue Rule.** All theme colors, container fills, and borders must be derived from the global CSS custom variables to ensure automatic adaptation when the toggle class (`.darkmodecss`) is active.

## 3. Typography

**Display Font:** 'Montserrat Alternates', sans-serif
**Body Font:** 'Jost', sans-serif

### Hierarchy
- **Display** (Extra Bold, 5.5rem, 1): Used for large hero text and major headings. Max letter-spacing floor is -0.02em.
- **Headline** (Semi-Bold, 2.75rem, 1.2): Section titles. Uses `text-wrap: balance` to prevent orphan words.
- **Title** (Bold, 1.5rem, 1.3): Component-level titles, cards, and modal headings.
- **Body** (Medium, 1rem, 1.5): Main body paragraphs, project descriptions, and details. Cap line length at 65–75ch.
- **Label** (Bold, 0.875rem, 1.2): Small text labels, category badges, and tabs.

### Named Rules
**The Text Balancing Rule.** Section headings and hero subtitles must use `text-wrap: balance` or `text-wrap: pretty` to ensure balanced, pleasing line breaks across all screens.

## 4. Elevation

Depth in this system is created using physical border borders (2px) and crisp, short shadows, rather than large, fuzzy, floating gradients.

### Shadow Vocabulary
- **Crisp Tangible Shadow** (`box-shadow: 4px 4px var(--shadow-color)`): Used on buttons and interactive cards to create a physical "lifted" appearance.
- **Dice Ambient Glow** (`box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4)`): Used specifically for the 3D dice faces and its dynamic drop-shadow to ground it in space.

### Named Rules
**The Hard-Edge Elevation Rule.** Drop shadows on cards and buttons must remain crisp, low-blur, and utilize the solid theme shadow variable (`var(--shadow-color)`). Soft "ghost shadows" exceeding 16px blur are prohibited.

## 5. Components

### Buttons
- **Shape:** Capsule shape (`border-radius: 3rem`).
- **Primary:** Solid amber-orange background with 1rem 2rem padding, a distinct border, and a crisp shadow.
- **Hover/Focus:** Scales up slightly (+3%) and shifts background color with a smooth ease-out transition.

### Dice (Hero Section)
- **Shape:** Soft cube with rounded corners (`border-radius: 15px`).
- **Faces:** Radial-gradient background simulating realistic plastic/bone texture, with inset shadows.
- **Pips (Dots):** Radial-gradient dark fills with inner highlights to look carved/drilled into the dice faces.

### Cards / Containers
- **Corner Style:** Moderately rounded (`border-radius: 15px`).
- **Border:** Solid 2px border using `var(--border-color)`.
- **Internal Padding:** Generous `1.5rem` to `2.5rem` spacing.

## 6. Do's and Don'ts

### Do
- **Do** store all visual styles in the global CSS theme system (`style.css`) using variables.
- **Do** support reduced-motion queries (`@media (prefers-reduced-motion: reduce)`) for all complex 3D animations.
- **Do** ensure layouts remain centered and vertically spaced to handle physical motion without shifting elements.

### Don't
- **Don't** use inline styles for components, animation durations, or transition values.
- **Don't** combine a 1px border with a soft drop shadow exceeding 16px blur on containers.
- **Don't** use arbitrary values like `999` or `9999` for `z-index`.
- **Don't** let large typography overflow narrow viewports on mobile; use clamp scales properly.
