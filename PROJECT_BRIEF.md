# Vaust Project Brief

Status: Experimental open-source WordPress plugin  
Primary audience: WordPress theme developers and digital agency teams  
Reference framework: Vue  
Last updated: 2026-11-09

## Summary

Vaust is an installable WordPress plugin and framework-neutral application layer for building modern WordPress front ends. The repository contains the plugin, its JavaScript packages, tests, and examples. It does not contain a WordPress installation.

The plugin turns an existing WordPress site into the authoritative backend for a modern front-end project. It gives developers one WordPress-aware project model that can be delivered as an installable theme or as a headless application without rebuilding routing, previews, authentication, or content integration for each mode.

Vue will be the first polished framework adapter. The architecture must allow future adapters without requiring the shared WordPress behavior to be reimplemented.

## Problem

Modern WordPress front-end development is split across two incompatible workflows:

- Theme development preserves WordPress routing, previews, plugin behavior, and familiar hosting, but often lacks the developer experience of modern JavaScript frameworks.
- Headless development provides modern framework tooling, but teams must rebuild WordPress behavior such as authenticated previews, template selection, redirects, menus, SEO metadata, and draft access.

Existing toolkits such as Faust.js solve much of the headless workflow, but their current developer experience is strongly tied to React and Next.js. Creating an equivalent Vue workflow remains technical, fragmented, and time-consuming. Agencies also face an all-or-nothing migration when many projects need progressive adoption.

## Product Thesis

WordPress data, identity, preview behavior, permalink routing, and template selection should form a shared contract below the rendering framework.

Theme and headless delivery should be deployment choices rather than separate application architectures. Vue should feel native and first-class, not like a port of React-oriented concepts.

## Product Principles

1. **Vue-first, framework-neutral underneath.** The first experience must be excellent for Vue developers while keeping shared behavior independent of Vue.
2. **WordPress remains WordPress.** Preserve its editorial workflow, permissions, permalinks, template concepts, and extension points.
3. **One project, multiple delivery modes.** Avoid separate theme and headless codebases.
4. **Progressive adoption.** Agencies must be able to replace one template or route at a time while retaining legacy PHP output.
5. **Reuse standards.** Build on WordPress, WPGraphQL, REST, and established authentication mechanisms rather than inventing parallel protocols.
6. **Adapters own rendering.** The core owns WordPress contracts; runtime adapters decide how those contracts are rendered and deployed.
7. **Escape hatches are features.** PHP templates, shortcodes, dynamic blocks, and plugin-owned output must remain usable where replacement is impractical.
8. **The product installs into WordPress.** WordPress core, local configuration, uploads, and databases never belong to the Vaust repository or release artifact.

## Repository and Installation Model

- The Git repository is the `vaust` plugin directory itself.
- During local development, it lives at `wp-content/plugins/vaust` inside a separate WordPress test installation.
- A release produces an installable `vaust.zip` with `vaust.php` at its root.
- Composer may install the same plugin package into `wp-content/plugins/vaust`.
- npm workspaces contain the framework-neutral core, Vue adapter, and CLI.
- WordPress test fixtures and example applications may be created by automation, but generated WordPress installations are never committed.

## Primary Users

### WordPress theme developer

Wants Vue, Vite, typed data, and component tooling without losing previews, template hierarchy, or standard WordPress hosting.

### Agency development team

Needs repeatable setup, client-safe previews, gradual migrations, compatibility diagnostics, and flexible deployment across different hosting constraints.

## Core User Journey

1. A developer connects a new or existing Vue project to a WordPress site.
2. Vaust discovers WordPress capabilities and generates typed content contracts.
3. The developer maps WordPress templates, blocks, or content types to Vue components.
4. WordPress permalinks resolve through the same routing contract in development and production.
5. An authenticated editor opens an unpublished draft from WordPress and sees it in the Vue front end.
6. An ACF or editor change refreshes the preview.
7. The team builds the project as either an installable WordPress theme or a headless application.
8. Unmigrated routes continue through PHP during progressive adoption.

## Version 0 Scope

Version 0 is a reference-quality vertical slice, not the full platform.

### Required

- Framework-neutral core contracts for configuration, content, routing, identity, previews, templates, and runtime capabilities.
- First-party Vue adapter.
- Development server integration with fast refresh.
- WordPress companion plugin for runtime discovery, preview coordination, and delivery-mode configuration.
- Published-content queries through a replaceable data provider.
- Authenticated draft and autosave previews.
- WordPress permalink resolution for pages and posts.
- A minimal template resolver for front page, single post, page, archive, search, and 404.
- Generated TypeScript types for the supported content schema, including ACF when available.
- Theme output that can be installed and activated in WordPress.
- Headless output with equivalent routes and content behavior.
- A PHP fallback for routes that have not been migrated.
- A reference project proving the complete journey.
- Contract tests that run against both delivery modes.

### Explicitly deferred

- React and other framework adapters.
- Native Swift, Kotlin, Flutter, or React Native clients.
- Full WooCommerce support.
- Universal compatibility with every WordPress plugin.
- A visual page builder.
- A hosted deployment platform.
- Automatic conversion of arbitrary PHP templates to Vue.

## Proposed System Boundaries

### Installable WordPress plugin

Responsibilities:

- Expose capability and configuration discovery.
- Coordinate authenticated preview URLs and short-lived preview state.
- Preserve WordPress permission checks.
- Describe routes, templates, redirects, and active integrations.
- Serve or register built theme assets when using theme mode.
- Provide hooks so third-party plugins can declare compatibility or adapters.

It must not contain framework-specific rendering logic.

### Framework-neutral JavaScript core

Responsibilities:

- Define stable TypeScript contracts.
- Normalize REST or GraphQL data providers.
- Resolve WordPress URLs and template contexts.
- Manage preview and authentication state without UI-framework primitives.
- Expose runtime capability checks.
- Support contract tests shared by all adapters.

### Vue adapter

Responsibilities:

- Vue components and composables for WordPress contexts.
- Vue Router integration.
- Vue-specific template registration and rendering.
- Development and live-preview integration.
- Server-rendered, client-rendered, and static behavior where the selected Vue runtime supports them.

### Build and delivery adapters

Initial targets:

- WordPress theme package.
- Headless web application.

Future target:

- PWA and Capacitor-based iOS/Android package using the same core contracts.

## Public Developer Experience

The intended workflow should converge on commands equivalent to:

```text
create-vaust
vaust dev
vaust generate
vaust doctor
vaust build --target=theme
vaust build --target=headless
```

Exact command names are not locked. The experience is locked: setup should be guided, failures should be diagnosable, and switching targets should not require application rewrites.

## Key Capabilities After Version 0

- Framework adapter SDK and conformance suite.
- Additional content providers and client libraries.
- Block-to-component mapping and a real-content component playground.
- Plugin compatibility diagnostics.
- Visual editing bridge between WordPress fields or blocks and rendered components.
- Live preview updates without manual refresh.
- SEO metadata, redirects, menus, pagination, archives, and canonical URL parity.
- PHP shortcode, dynamic block, and plugin-rendered HTML escape hatches.
- Deployment adapters for common Node, static, edge, and WordPress hosting environments.
- PWA and Capacitor mobile adapter with offline caching, deep links, secure sessions, push notifications, media capture, and native sharing.

## Mobile Direction

Mobile is a future runtime, not a Version 0 build flag. A Capacitor target is the preferred first experiment because it can reuse the Vue rendering layer.

The shared core must avoid browser-only assumptions in data, identity, route, and preview contracts. Mobile-specific concerns such as secure credential storage, offline synchronization, push delivery, native permissions, deep links, and app-store packaging belong in a dedicated runtime adapter.

## Security Requirements

- WordPress remains authoritative for user identity and content permissions.
- Preview access must be short-lived, scoped, and validated server-side.
- Secrets must never be embedded in browser or theme bundles.
- Browser sessions, application passwords, and service credentials must have separate documented use cases.
- Preview URLs must not grant broader access than the initiating user or configured reviewer policy.
- Cross-origin requests and window messaging must validate origin, destination, and message type.
- All supported authentication and preview flows require automated negative tests.

## Compatibility Strategy

Vaust cannot promise arbitrary plugin compatibility. It will classify integrations:

1. **Data-compatible:** works through standard REST or GraphQL data.
2. **Markup-compatible:** can reuse server-rendered HTML.
3. **Adapter-required:** needs explicit integration code.
4. **Theme-only:** depends on PHP lifecycle behavior unavailable headlessly.
5. **Unsupported:** cannot behave correctly under the selected runtime.

The planned `doctor` workflow should report these categories rather than silently producing broken output.

## Distribution

- Composer package and WordPress plugin ZIP for the Vaust plugin.
- npm packages for the core, Vue adapter, CLI, and build targets.
- GitHub repository with issues, discussions, contribution guidance, and architecture decisions.
- Automated releases with changelogs, signed or checksummed artifacts, compatibility matrices, and upgrade notes.
- A runnable reference project and local WordPress development environment.

## Success Criteria for the Experiment

The experiment succeeds when an external WordPress theme developer can:

1. Start from the reference project without private guidance.
2. Connect it to a WordPress site in under 15 minutes.
3. Render a page and post through Vue using native permalinks.
4. Open an authenticated draft preview from the WordPress editor.
5. Change an ACF field and observe the updated preview.
6. build both theme and headless outputs from the same project.
7. Leave one route on its existing PHP template.
8. Understand a compatibility failure from the diagnostic output.

The strongest proof is not package count. It is the same tested application behaving consistently in both delivery modes.

## Recommended Implementation Approach

Use a contract-first vertical slice:

1. Write observable behavior tests for one page, one post, one draft, one autosave, one ACF field, one redirect, and one PHP fallback.
2. Define the smallest framework-neutral contracts needed to pass those tests.
3. Implement the WordPress companion and Vue adapter together against those contracts.
4. Produce theme and headless builds from the same fixture.
5. Extract reusable packages only after the vertical slice exposes real boundaries.

This avoids two bad extremes: a Vue-only prototype whose assumptions cannot support another adapter, and a large abstract platform designed before any complete workflow exists.

## Open Questions

- Should REST, WPGraphQL, or a hybrid provider be the default in Version 0?
- Which Vue application runtime should power the reference headless build?
- How should theme mode handle server rendering when conventional WordPress hosting has no persistent Node process?
- What is the minimum safe mechanism for shareable client previews without WordPress accounts?
- How should PHP fallbacks compose with Vue navigation and caching?
- Which ACF field types are required for the first type-generation proof?
- Which WordPress versions, PHP versions, and hosting models define the initial support matrix?
- What project name and package namespace are available for public distribution?

## Non-Goals

- Replacing WordPress as a CMS.
- Hiding all WordPress concepts from developers.
- Making every WordPress plugin work headlessly.
- Competing with Vue, Nuxt, Vite, WPGraphQL, or WordPress core.
- Treating mobile as identical to web.
- Building the entire long-term roadmap before validating the core workflow.

