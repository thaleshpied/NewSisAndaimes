self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('CHACHE_SIS_ANDAIMES').then((cache) => {
      return cache.addAll([
        '/NewSisAndaimes/SisAndaimes-main/',
        '/index.php'
        //'/NewSisAndaimes/SisAndaimes-main/**'
      ]).catch((error) => {
        console.error('Failed to cache resources:', error);
      });
    })
  );
});

self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request).then((fetchResponse) => {
        // Cache the fetched response
        return caches.open('CHACHE_SIS_ANDAIMES').then((cache) => {
          cache.put(event.request, fetchResponse.clone());
          return fetchResponse;
        });
      });
    })
  );
});
