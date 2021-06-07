## glFusion UIkit3 Theme

The UIkit3 theme is based on the UIKIT v3 and the glFusion CMS theme.

### Information

#### Development
  - Some UIkit2 styles have been deprecated, such as uk-button-success and some column widths.
    uk2-compat.css is included to replaced commonly-used styles.
  - UIKit2 icons are no longer available as UIkit3 has a much smaller set of SVG icons.
    uk2-icons.css is included to allow use of uk-icon classes.
  - The datepicker and timepicker components have been removed and need to be replaced by the
    stock glFusion jquery-based date/time picker
  - The drag-and-drop file uploader has changed significantly.
  - The progress bar has changed significantly.

#### Menu

The navigation menu should be named *cms_theme*

The off-canvas menu should be named *navigation_mobile*

### Structure

Directory|Description
---------|-----------
css/ |this contains the uikit CSS files. All UIKIT CSS files are stock - no modifications are made.

### General Notes

Any overrides to the styles should be done in the theme's custom.css file.

UIKIT has a customization site to change overall colors / fonts.  These files can be used directly and overwrite the delivered UIKIT styles.


## Browser Support

![Chrome](https://raw.github.com/alrra/browser-logos/master/chrome/chrome_48x48.png) | ![Firefox](https://raw.github.com/alrra/browser-logos/master/firefox/firefox_48x48.png) | ![IE](https://raw.github.com/alrra/browser-logos/master/internet-explorer/internet-explorer_48x48.png) | ![Safari](https://raw.github.com/alrra/browser-logos/master/safari/safari_48x48.png) | ![Opera](https://raw.github.com/alrra/browser-logos/master/opera/opera_48x48.png)
--- | --- | --- | --- | --- |
Latest ✔ | Latest ✔ | 9+ ✔ | 7.1+ ✔ | Latest ✔ |
