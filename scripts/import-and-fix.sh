#!/usr/bin/env bash
# After docker compose up, run this to do a thorough URL search-replace.
# Usage: ./scripts/import-and-fix.sh

set -euo pipefail

OLD_URL="https://ottoex.com"
NEW_URL="http://localhost:8083"

echo "Running WP-CLI search-replace: $OLD_URL → $NEW_URL"
docker compose run --rm wpcli search-replace "$OLD_URL" "$NEW_URL" --all-tables --skip-columns=guid

# Also catch http variant
echo "Running WP-CLI search-replace: http://ottoex.com → $NEW_URL"
docker compose run --rm wpcli search-replace "http://ottoex.com" "$NEW_URL" --all-tables --skip-columns=guid

echo "Flushing cache..."
docker compose run --rm wpcli cache flush

echo "Done. Visit http://localhost:8083"
