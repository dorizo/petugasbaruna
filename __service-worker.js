//--------------------------------------------------------------------------
// You can find dozens of practical, detailed, and working examples of 
// service worker usage on https://github.com/mozilla/serviceworker-cookbook
//--------------------------------------------------------------------------

// Version
var VERSION = 2.2

// Cache name
var CACHE_NAME = 'cache-version-' + VERSION;

// Files
var REQUIRED_FILES = [
  '/'
];

self.addEventListener('install', function (event) {
  // Perform install step:  loading each required file into cache
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function (cache) {
        // Add all offline dependencies to the cache
        return cache.addAll(REQUIRED_FILES);
      })
      .then(function () {
        return self.skipWaiting();
      })
  );
});

self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request)
      .then(function (response) {
        // Cache hit - return the response from the cached version
        if (response) {
          return response;
        }
        // Not in cache - return the result from the live server
        // `fetch` is essentially a "fallback"
        return fetch(event.request);
      }
      )
  );
});


self.addEventListener('activate', (event) => {
  const cacheAllowlist = ['v2'];

  event.waitUntil(
    caches.forEach((cache, CACHE_NAME) => {
      console.log(CACHE_NAME);
      if (!cacheAllowlist.includes(CACHE_NAME)) {
        return caches.delete(CACHE_NAME);
      }
    })
  );
});
