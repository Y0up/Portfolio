/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';


const imgs = document.getElementsByTagName('img');
imgs.forEach(img => {
    let info = img.nextElementSibling;

    img.addEventListener('click', function () {
        if (info.style.display === "none") {
            info.style.display = "flex"
        }
        else {
            info.style.display = "none";
        }
    });
});
