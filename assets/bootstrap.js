import { startStimulusApp } from '@symfony/stimulus-bridge';

// Registers Stimulus controllers from controllers.json and in the controllers/ directory
export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.[jt]sx?$/
));

// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
function changeColor(elem,color) {

    elem.style.color = color;
    
    }

    document.getElementById("CSS Settings").addEventListener("mouseover", function handleMouseOver() {

        changeColor(this, "red");
        
        });
        document.getElementById("CSS Settings").addEventListener("mouseout", function handleMouseOut() {

            changeColor(this, "black");
            
            });
            document.getElementById("CSS Settings2").addEventListener("mouseover", function handleMouseOver() {

                changeColor(this, "red");
                
                });
                document.getElementById("CSS Settings2").addEventListener("mouseout", function handleMouseOut() {
        
                    changeColor(this, "black");
                    
                    });
                    document.getElementById("CSS Settings3").addEventListener("mouseover", function handleMouseOver() {

                        changeColor(this, "red");
                        
                        });
                        document.getElementById("CSS Settings3").addEventListener("mouseout", function handleMouseOut() {
                
                            changeColor(this, "black");
                            
                            });
                            document.getElementById("CSS Settings4").addEventListener("mouseover", function handleMouseOver() {

                                changeColor(this, "red");
                                
                                });
                                document.getElementById("CSS Settings4").addEventListener("mouseout", function handleMouseOut() {
                        
                                    changeColor(this, "black");
                                    
                                    });



                                  
                                    
                                      
                                      
                                     
                                    