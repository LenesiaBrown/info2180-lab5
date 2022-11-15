window.onload = function(){
    let btn1 = document.querySelector("#lookup");
    // let btn = document.getElementById("lookup"); 

    btn1.addEventListener('click', function(e){
        e.preventDefault();

        fetch("http://localhost/info2180-lab5/world.php")
            .then(response => {
                if (response.ok) {
                    //console.log("work");
                    return response.text()
                    
                } else {
                    return Promise.reject("Something went wrong...")
                }
            })
            .then(data => {
                let resultans = document.querySelector("#result");
                resultans.innerHTML = data;
            })
            .catch(error => console.log("There was an error: " + error));

        
    });
}