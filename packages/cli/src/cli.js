#!/usr/bin/env node

const command = process.argv[2] ?? 'help';

if (command === 'help') {
  console.log('Vaust CLI scaffold. Commands will be added as the runtime contracts are implemented.');
  process.exit(0);
}

console.error(`Unknown command: ${command}`);
process.exit(1);

