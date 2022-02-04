

function login()
{
    let email = document.getElementById("email").value;
    let pass = document.getElementById("pass").value;
    console.log(email);
    console.log(pass);
    
    fetch("Funct9.php")
    .then(function(response)
    {
        return response.json();
    })
    .then(function(data)
    {
        
        let i;
        console.log(data);
        
        const count = Object.keys(data).length;
        for(i=0;i<count;i++)
        {
            console.log(data[i].Email);
        }
        
    })
}