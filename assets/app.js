/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import 'bootstrap';

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';


var button = document.getElementById('myButton');
button.onclick = function() {
  location.assign('/{id}');
}

function changeColor(elem,color) {

    elem.style.color = color;
    
    }

    document.getElementById("CSS Settings").addEventListener("mouseover", function handleMouseOver() {

        changeColor(this, "red");
        
        });
        document.getElementById("CSS Settings").addEventListener("mouseout", function handleMouseOut() {

            changeColor(this, "black");
            
            });


          