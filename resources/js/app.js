import "./bootstrap";

import.meta.glob(["../images/**"]);

// import "highlight.js/styles/github.css";

if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
//   // Import dark mode styles
import("highlight.js/styles/night-owl.min.css");
//   import('./styles-dark.css');
} else {
//   // Import light mode styles
import("highlight.js/styles/default.min.css");
//   import('./styles-light.css');
}
