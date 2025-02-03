<!-- Stylesheets -->
<link rel="stylesheet"
    href="https://assets.website-files.com/5e87e737ee7085b9ba02c101/css/mac-template.webflow.28334f589.css"
    type="text/css" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
<link rel="shortcut icon"
    href="https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e8d5452f5d16a49aca4c850_mac-fav.png"
    type="image/x-icon" />
<link rel="apple-touch-icon" href="https://cdn.prod.website-files.com/img/webclip.png" />

<!-- Custom Styles -->
<style>
    /* tambahkan prefix vendor untuk properti CSS */
    html {
        font-size: 62.5%;
    }

    html,
    body,
    .site-container {
        cursor: url("https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e8a415aacdbb524713eb277_cursor.png"),
            auto;
        cursor: -webkit-image-set(url("https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e8a415aacdbb524713eb277_cursor.png") 1x,
                url("https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e8a415acce5fbb114b18c35_cursor%402x.png") 2x),
            auto;
    }

    a,
    .dropdown-toggle,
    .button {
        cursor: url("https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e8a4a6206f67059bcd497ce_cursor-pointer.png"),
            auto;
        cursor: -webkit-image-set(url("https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e8a4a6206f67059bcd497ce_cursor-pointer.png") 1x,
                url("https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e8a4a62ab1cf8419ea62647_cursor-pointer%402x.png") 2x),
            auto;
    }

    /*width*/
    .site-container::-webkit-scrollbar {
        width: 14px;
    }

    /*track*/
    .site-container::-webkit-scrollbar-track {
        background: url("https://assets.website-files.com/5e83fdebae1ad8747ffce684/5e864de332df030389abf5bd_pattern-grey.svg");
        background-size: 6px;
        border-left: 4px solid #000000;
    }

    /*thumb*/
    .site-container::-webkit-scrollbar-thumb {
        background: #c4c4c4;
        border: 4px solid #000000;
        border-right: none;
    }

    /*thumb hover*/
    .site-container::-webkit-scrollbar-thumb:hover {
        background: #ffffff;
    }

    /*thumb pressed*/
    .site-container::-webkit-scrollbar-thumb:active {
        background: #ffffff;
    }

    .header {
        width: calc(100% - 16px);
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .site-container {
        height: calc(100vh - 68px);
        overflow-x: hidden;
        overflow-y: scroll;
        margin-top: -4px;
        margin-bottom: -4px;
    }

    .hover\:shadow-lg:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
            0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .quick-links-wrapper {
        margin-top: 40px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .service-card {
        padding: 20px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .project-card {
        padding: 20px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .contact-section {
        padding: 100px 0;
        background-color: #f7f7f7;
    }

    .contact-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .contact-form {
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .contact-form button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .contact-form button:hover {
        background-color: #3e8e41;
    }

    .contact-map {
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .contact-map iframe {
        width: 100%;
        height: 300px;
        border: none;
    }

    /* Responsif untuk layar kecil (HP) */
    @media (max-width: 768px) {
        .contact-wrapper {
            flex-direction: column;
        }

        .contact-form,
        .contact-map {
            width: 100%;
        }
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .footer-bottom {
        text-align: center;
        padding: 20px 0;
    }

    @media (min-width: 992px) {
        html.w-mod-js:not(.w-mod-ix) [data-w-id="33bd0df0-f893-c11d-6f02-decffed53f6b"] {
            opacity: 0;
        }
    }

    @media screen and (min-width: 768px) {
        .header {
            width: calc(100% - 24px);
        }
    }

    @media screen and (min-width: 991px) {
        .header {
            width: calc(100% - 40px);
        }

        .site-container::-webkit-scrollbar {
            width: 24px;
        }
    }
</style>
