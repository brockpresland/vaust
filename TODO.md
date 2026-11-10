# Vaust To-Do List

The list is ordered to prove the riskiest workflow before expanding the platform. Check off work only when its acceptance criteria pass.

## Phase 0: Resolve the Unknowns

- [x] Use a plugin-only repository located at `wp-content/plugins/vaust` during local development.
- [x] Add an installable WordPress plugin bootstrap.
- [x] Add initial Composer and npm workspace manifests.
- [ ] Confirm the final project name, public package namespaces, and license.
- [ ] Choose the minimum WordPress, PHP, Node.js, and browser support matrix.
- [ ] Decide whether Version 0 defaults to REST, WPGraphQL, or a hybrid provider.
- [ ] Choose the reference Vue runtime for the headless target.
- [ ] Write an architecture decision for theme-mode rendering on PHP-only hosting.
- [ ] Define the authenticated preview threat model and reviewer-access policy.
- [ ] Select the ACF field types required for the first proof.

Exit criteria: every open choice that changes the Version 0 architecture has a recorded decision in `MEMORY.md` or an architecture decision record.

## Phase 1: Define Observable Contracts

- [ ] Create fixtures for a page, post, archive, search result, redirect, 404, draft, autosave, and ACF field.
- [ ] Specify the normalized content, route, template, identity, preview, and runtime-capability contracts.
- [ ] Define data-provider and framework-adapter interfaces.
- [ ] Define the PHP fallback behavior for migrated and unmigrated routes.
- [ ] Write delivery-mode parity tests before implementing packages.
- [ ] Write security tests for expired, tampered, unauthorized, and cross-origin preview requests.

Exit criteria: the contract suite describes the same visible behavior for theme and headless targets.

## Phase 2: Build the Vertical Slice

- [ ] Create the minimal WordPress companion plugin.
- [ ] Implement runtime capability discovery.
- [ ] Implement the selected content provider.
- [ ] Implement WordPress permalink and template-context resolution.
- [ ] Implement secure authenticated draft and autosave previews.
- [ ] Implement the first ACF schema-to-TypeScript generator.
- [ ] Build the Vue adapter and router integration.
- [ ] Render the fixture page and post through Vue.
- [ ] Add fast-refresh development behavior.
- [ ] Add a PHP fallback for one unmigrated route.
- [ ] Produce an installable theme build.
- [ ] Produce an equivalent headless build.
- [ ] Run the same contract suite against both outputs.

Exit criteria: one reference project completes the end-to-end journey documented in `PROJECT_BRIEF.md`.

## Phase 3: Make It Usable by Someone Else

- [ ] Create a guided project generator.
- [ ] Add configuration validation with actionable error messages.
- [ ] Add a `doctor` command for environment and compatibility checks.
- [ ] Document local development, preview setup, theme builds, and headless builds.
- [ ] Provide a reproducible local WordPress environment with seeded fixtures.
- [ ] Test onboarding with at least three external theme or agency developers without live assistance.
- [ ] Record setup time, failed steps, and misunderstood concepts.
- [ ] Fix every blocker found during those sessions.

Exit criteria: an external developer connects WordPress and completes both builds in under 15 minutes without private instructions.

## Phase 4: Package and Release

- [ ] Finalize package boundaries based on the working slice.
- [ ] Publish the core, Vue adapter, CLI, and build adapters to npm.
- [ ] Build an installable plugin ZIP with `vaust.php` at its root and no development-only files.
- [ ] Publish the plugin through Composer and GitHub Releases.
- [ ] Add CI for PHP, TypeScript, Vue, integration, security, and cross-mode contract tests.
- [ ] Add automated versioning, changelogs, checksums, and release notes.
- [ ] Publish the compatibility matrix and upgrade policy.
- [ ] Add contribution guidelines, code of conduct, issue templates, and architectural overview.
- [ ] Tag the first experimental release.

Exit criteria: a clean machine can install only public artifacts and reproduce the reference workflow.

## Phase 5: Expand Carefully

- [ ] Add menus, pagination, archives, redirects, SEO metadata, and canonical URL parity.
- [ ] Add block-to-Vue component mapping.
- [ ] Add live preview updates without manual refresh.
- [ ] Add a real-content component playground.
- [ ] Add plugin compatibility declarations and diagnostics.
- [ ] Add safe server-rendered markup escape hatches for shortcodes and dynamic blocks.
- [ ] Publish the framework adapter SDK and conformance suite.
- [ ] Validate the adapter boundary with one small non-Vue proof.
- [ ] Explore PWA output.
- [ ] Prototype the Capacitor mobile adapter only after the web contracts stabilize.

## Later Ideas

- [ ] Visual editing bridge from WordPress fields or blocks to rendered components.
- [ ] Deployment adapters for static, Node, edge, and conventional WordPress hosting.
- [ ] Offline content and synchronization policies.
- [ ] Push notifications and deep-link routing for mobile.
- [ ] WooCommerce identity, cart, checkout, and order contracts.
- [ ] Agency starter kits and reusable integration recipes.

## Definition of Done for Any Feature

- [ ] Observable behavior is documented.
- [ ] Theme and headless implications are considered.
- [ ] Authentication and authorization implications are tested.
- [ ] Failure messages tell the developer what to do next.
- [ ] Automated tests cover success and failure paths.
- [ ] User-facing documentation and migration notes are updated.
- [ ] The decision memory is updated when the feature changes a durable project rule.
