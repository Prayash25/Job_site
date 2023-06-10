let v="";
let sts=0;
fetch('http://localhost/3rd_jobsite/api/index_api.php')
           .then(res=>{
            // console.log(res);
                sts=res.status;
                return res.json();
           })
           .then(resp=>{
            console.log(resp);
            // console.log(value);
             if(sts==200){
                resp.map((val)=>{
                  v+=`<div class="card" style="width: 18rem; margin: 5%;">
                  <div class="card-body">
                    <h3 class="card-title">${val.company}</h3>
                    <h5 class="card-title one">${val.role}</h5>
                    <p class="card-text one">${val.skills}</p>
                    <p class="card-text one">${val.description}</p>
                    <p><span style="margin-right: 12%;">${val.ctc}</span>
                    <span style="margin-left: 12%;">${val.openings}</span></p>
                    <p><span style="margin-right: 35%;"><a href="${val.linkedin}" ><i style="font-size: 25px;" class="fa fa-linkedin"></i></a></span>
                      <span style="margin-left: 35%;"><a href="mailto:${val.email}"><i style="font-size: 25px;" class="fa fa-envelope"></i></a></span></p>
                    <!-- <button class="btn btn-primary" onclick="go_form('sdfghj')" id="on">Go somewhere</button> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="go_form('${val.email}')">
                      Launch demo modal
                    </button>
                  </div>
                </div>`
                });
                document.getElementById("jobs").innerHTML=v;
             }
             else{
              console.log(sts);
             }
           })
           .catch(error=>console.log("Failed to load API"));
           
// function gett(){
//   console.log("fghjkgvj");
//    let a=document.getElementById("on").value;
//    console.log(a);
//    alert(a);
// }
// let a=document.getElementById("on").innerText;
// console.log(a);