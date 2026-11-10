# Vaust Decision Memory

This file records durable product and architecture decisions. Add a dated entry when a decision changes. Do not silently rewrite history; mark replaced decisions as superseded and link to the new entry.

## Current Decisions

### 2026-11-10: Plugin-only repository

- Status: accepted
- The Vaust repository contains an installable WordPress plugin, its JavaScript packages, tests, examples, and documentation.
- WordPress core and site-specific runtime data are not part of the repository.
- The local repository lives directly at `wp-content/plugins/vaust` inside a separate WordPress development installation.
- Release artifacts must install through a plugin ZIP or Composer without requiring a repository-shaped WordPress installation.
- This supersedes the initial whole-installation repository layout.

### 2026-11-09: Project intent

- Vaust is an experimental open-source project.
- The first audience is WordPress theme developers and digital agency teams.
- The project is not currently optimized around startup validation or commercial packaging.

### 2026-11-09: Product identity

- Vaust is a framework-neutral WordPress application layer.
- Its primary identity is portability between WordPress theme and headless delivery modes.
- Framework neutrality alone is not sufficient differentiation because Faust.js has publicly described a multi-framework direction.

### 2026-11-09: Framework strategy

- Vue is the first reference framework and must receive a first-class developer experience.
- The core must not depend on Vue concepts.
- React will not be implemented in the first release.
- Future framework adapters must be validated through shared contracts and conformance tests.

### 2026-11-09: WordPress strategy

- WordPress remains authoritative for identity, permissions, editorial state, permalinks, and content lifecycle.
- Reuse established WordPress, REST, WPGraphQL, and authentication mechanisms where they fit.
- Preserve PHP escape hatches and enable progressive, route-by-route adoption.
- Plugin compatibility will be diagnosed and classified, not universally promised.

### 2026-11-09: Initial product slice

- The first proof must include published Vue content, native permalinks, authenticated drafts or autosaves, ACF typing, theme output, headless output, and a PHP fallback.
- Both delivery modes must run against the same contract tests and reference application.
- Package boundaries should be extracted from a working vertical slice rather than designed entirely in advance.

### 2026-11-09: Mobile direction

- Mobile is a credible future runtime but is outside Version 0.
- The first mobile experiment should use Capacitor so it can reuse the Vue rendering layer.
- The shared core must avoid browser-only assumptions.
- Native runtime concerns remain in a dedicated adapter.

### 2026-11-09: Distribution

- The WordPress code will be distributed as a Composer package and installable plugin ZIP.
- JavaScript packages and tooling will be distributed through npm.
- The project requires an automated release pipeline and runnable reference project before calling the workflow usable.

## Assumptions to Validate

- Theme developers want Vue integration without adopting a fully headless hosting model.
- Agencies value switching delivery modes more than a headless-only Vue toolkit.
- Authenticated previews can share one safe contract across theme and headless modes.
- Progressive PHP fallback can coexist with client navigation without confusing routing or caching.
- A framework-neutral core can remain small enough that the Vue experience does not feel generic or indirect.
- ACF is the right first custom-field integration.

## Open Decisions

- Default data provider: REST, WPGraphQL, or hybrid.
- Reference Vue runtime and server-rendering strategy.
- Theme-mode rendering strategy on PHP-only hosting.
- Shareable preview policy for reviewers without WordPress accounts.
- Minimum supported WordPress, PHP, Node.js, and browser versions.
- Monorepo structure and public package names.
- License, governance, contribution model, and release cadence.
- Whether `Vaust` is the final public name.

## Decision Entry Template

```markdown
### YYYY-MM-DD: Decision title

- Status: accepted | superseded | reversed | experimental
- Decision: What was decided.
- Reason: Why this choice was made.
- Consequences: What becomes easier, harder, or excluded.
- Replaces: Optional link to an older entry.
```

