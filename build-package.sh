#!/usr/bin/env bash
set -euo pipefail

component="com_ra_mailman"
manifest="ra_mailman.xml"
version="$(sed -n 's:.*<version>\(.*\)</version>.*:\1:p' "$manifest" | head -1)"
package="${component}-${version}.zip"
plugin="plg_ra_mailman"
plugin_version="$(sed -n 's:.*<version>\(.*\)</version>.*:\1:p' "${plugin}/ra_mailman.xml" | head -1)"
plugin_package="${plugin}-${plugin_version}.zip"

rm -rf dist
mkdir -p dist

zip -r "dist/${package}" "$manifest" admin api forms languages src tmpl \
	-x '.DS_Store' \
	-x '*/.DS_Store' \
	-x '._*' \
	-x '*/._*' \
	-x '*.old' \
	-x '*.old2'

echo "Created dist/${package}"

(
	cd "$plugin"
	zip -r "../dist/${plugin_package}" ra_mailman.xml language services src \
		-x '.DS_Store' \
		-x '*/.DS_Store' \
		-x '._*' \
		-x '*/._*'
)

echo "Created dist/${plugin_package}"
