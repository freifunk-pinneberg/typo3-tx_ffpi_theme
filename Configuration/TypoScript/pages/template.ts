## -----------------------------------
## Template
## -----------------------------------

page = PAGE
page.config.doctype = html5
page.bodyTagCObject = HTML
page.bodyTagCObject.value.field = pid
page.bodyTagCObject.value.wrap = <body id="p|">

## ------- base URL --------------------
config.baseURL = {$ffpi.baseurl}

config.noPageTitle = 2
page.headerData.10 = TEXT
page.headerData.10.field = title
page.headerData.10.noTrimWrap = | <title>| - Freifunk Pinneberg</title> |
page.headerData.10.insertData =	1

## ------ Facebook ---------------------
page.headerData.20 = TEXT
page.headerData.20.value = <meta property="og:image" content="https://pinneberg.freifunk.net/fileadmin/layout/ffpi/bilder/Facebook_preview.png" />

## ------ RSS Feed ---------------------
page.headerData.30 = TEXT
page.headerData.30.value = <link rel="alternate" type="application/rss+xml" title="Freifunk Pinneberg - News (RSS)" href="https://pinneberg.freifunk.net/news/?type=200" />

## ------- Mobile ----------------------
page.meta.viewport = width=device-width, initial-scale=1

## ---------- Analytics --------
page.footerData.50 = TEXT
page.footerData.50.value (
<!-- Piwik -->
<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="/piwik/";
		_paq.push(['setTrackerUrl', u+'piwik.php']);
		_paq.push(['setSiteId', 1]);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	})();
</script>
<noscript><p><img src="/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
)