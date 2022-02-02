/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

var responses = document.getElementsByClassName('test');

var res = document.getElementById('res').textContent;

console.log(responses);


for (let response of responses) {
    const test = response.textContent
    if (test == res) {
        response.addEventListener('click', function () {
            response.className = "col text-center bg-success m-2";
            console.log('coucou');
        })
    } else {
        response.addEventListener('click', function () {
            response.className = "col text-center bg-danger m-2";
            console.log('pascoucou');
        })
    }
}

