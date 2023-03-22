const staticDevCoffee = "dev-coffee-site-v1";
const assets = [
  "/",
  "/login.html",
  "/assets/img/favicon.ico",
  "/assets/lib/bootstrap/css/bootstrap.min.css",
  "/assets/lib/font-awesome/css/font-awesome.css",
  "/assets/css/style.css",
  "/assets/css/style-responsive.css",
  "/assets/lib/jquery/jquery.min.js",
  "/assets/lib/bootstrap/js/bootstrap.min.js",
];

self.addEventListener("install", (installEvent) => {
  installEvent.waitUntil(
    caches.open(staticDevCoffee).then((cache) => {
      cache.addAll(assets);
    })
  );
});
