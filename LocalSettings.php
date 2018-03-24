<?php
# This file was automatically generated by the MediaWiki 1.30.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Passion for Coding";
$wgMetaNamespace = "Passion_for_Coding";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://kb.passionforcoding.org";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; # UPO

$wgEmergencyContact = "no-reply@passionforcoding.org";
$wgPasswordSender = "no-reply@passionforcoding.org";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$url = parse_url(getenv("JAWSDB_MARIA_URL"));

$wgDBtype = "mysql";
$wgDBserver = $url["host"];
$wgDBname = substr($url["path"], 1);
$wgDBuser = $url["user"];
$wgDBpassword = $url["pass"];

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = 'memcached-pecl';
$wgMemCachedServers = explode(',', getenv('MEMCACHEDCLOUD_SERVERS'));
$wgMemCachedUser = getenv("MEMCACHEDCLOUD_USERNAME");
$wgMemCachedPassword = getenv("MEMCACHEDCLOUD_PASSWORD");

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = getenv("SECRET_KEY");

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = getenv("UPGRADE_KEY");

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/licenses/by-nc-sa/4.0/";
$wgRightsText = "Creative Commons Attribution-NonCommercial-ShareAlike";
$wgRightsIcon = "$wgResourceBasePath/resources/assets/licenses/cc-by-nc-sa.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = true;
$wgGroupPermissions['*']['edit'] = false;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );

# STMP configuration for Mailgun
$wgSMTP = array(
 'host'     => getenv("MAILGUN_SMTP_SERVER"), // could also be an IP address. Where the SMTP server is located
 'IDHost'   => getenv("MAILGUN_DOMAIN"),      // Generally this will be the domain name of your website (aka mywiki.org)
 'port'     => getenv("MAILGUN_SMTP_PORT"),                 // Port to use when connecting to the SMTP server
 'auth'     => true,               // Should we use SMTP authentication (true or false)
 'username' => getenv("MAILGUN_SMTP_LOGIN"),     // Username to use for SMTP authentication (if being used)
 'password' => getenv("MAILGUN_SMTP_PASSWORD")       // Password to use for SMTP authentication (if being used)
);

# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtensions('ExtensionName');
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:

// s3 filesystem repo
$wgUploadDirectory = 'wiki';
$wgUploadS3Bucket = getenv("AWS_S3_BUCKET");
$wgUploadS3SSL = true; // true if SSL should be used
$wgPublicS3 = false; // true if public, false if authentication should be used

$wgS3BaseUrl = "http".($wgUploadS3SSL?"s":"")."://s3.amazonaws.com/$wgUploadS3Bucket";

//viewing needs a different url from uploading. Uploading doesnt work on the below url and viewing doesnt work on the above one.
$wgS3BaseUrlView = "http".($wgUploadS3SSL?"s":"")."://".$wgUploadS3Bucket.".s3.amazonaws.com";
$wgUploadBaseUrl = "$wgS3BaseUrlView/$wgUploadDirectory";

// leave $wgCloudFrontUrl blank to not render images from CloudFront
$wgCloudFrontUrl = getenv("AWS_S3_BUCKET_CNAME");//"http".($wgUploadS3SSL?"s":"").'://YOUR_CLOUDFRONT_SUBDOMAIN.cloudfront.net/';
$wgLocalFileRepo = array(
        'class' => 'LocalS3Repo',
        'name' => 's3',
        'directory' => $wgUploadDirectory,
        'url' => $wgUploadBaseUrl ? $wgUploadBaseUrl . $wgUploadPath : $wgUploadPath,
        'urlbase' => $wgS3BaseUrl ? $wgS3BaseUrl : "",
        'hashLevels' => $wgHashedUploadDirectory ? 2 : 0,
        'thumbScriptUrl' => $wgThumbnailScriptPath,
        'transformVia404' => !$wgGenerateThumbnailOnParse,
        'initialCapital' => $wgCapitalLinks,
        'deletedDir' => $wgUploadDirectory.'/deleted',
        'deletedHashLevels' => $wgHashedUploadDirectory ? 2 : 0,
        'AWS_ACCESS_KEY' => getenv("AWS_ACCESS_KEY_ID"),
        'AWS_SECRET_KEY' => getenv("AWS_SECRET_ACCESS_KEY"),
        'AWS_S3_BUCKET' => $wgUploadS3Bucket,
        'AWS_S3_PUBLIC' => $wgPublicS3,
        'AWS_S3_SSL' => $wgUploadS3SSL,
        'cloudFrontUrl' => $wgCloudFrontUrl,
);
require_once "$IP/extensions/LocalS3Repo/LocalS3Repo.php";
