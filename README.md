# com_ra_mailman

## Experimental profile lookup API

Branch `leader-email-lookup-api` adds a read-only Joomla Web Services endpoint for looking up Mailman profiles by name. This is intended as a possible future source for Walks Manager Watch leader email addresses.

Build the installable files:

```sh
bash build-package.sh
```

Install both generated ZIP files from `dist/`:

- `com_ra_mailman-<version>.zip`
- `plg_ra_mailman-<version>.zip`

Enable the `Webservices - RA Mailman` plugin, then test with a Joomla API token:

```sh
curl -s \
  -H "Accept: application/vnd.api+json" \
  -H "Content-Type: application/json" \
  -H "X-Joomla-Token: $JOOMLA_TOKEN" \
  "https://ramblerseastcheshire.org.uk/api/index.php/v1/ra_mailman/profiles?filter_search=Richard%20Higham"
```

The endpoint only returns rows when a search value is provided.
