let v="";
let sts=0;
fetch('http://localhost/3rd_jobsite/api/index_api.php')
           .then(res=>{
            // console.log(res);
                sts=res.status;
                // for(let i=0;i<1000000000;i++){}
                return res.json();
           })
           .then(resp=>{
            console.log(resp);
            // console.log(sts);
             if(sts==200){
              let premium;
                resp.map((val)=>{
                  v+=`<div class="card" style="width: 18rem; margin: 5%;" data-aos="flip-up" data-aos-duration="1000">
                  <div class="card-body">
                    <h3 class="card-title" >${val.company}</h3>
                    <h5 class="card-title one" style="color:#fbc257;">${val.role}</h5>
                    <p class="card-text one">${val.skills}</p>
                    <p class="card-text one">${val.description}</p>
                    <p><span class="bold"; style="margin-right: 12%;">CTC: ${val.ctc}</span>
                    <span style="margin-left: 12%;">Openings: ${val.openings}</span></p>
                    <p><span style="margin-right: 35%;"><a href="${val.linkedin}" ><i style="font-size: 25px;" class="fa fa-linkedin"></i></a></span>
                      <span style="margin-left: 35%;"><a href="mailto:${val.email}"><i style="font-size: 25px;" class="fa fa-envelope"></i></a></span></p>
                    <button type="button" class="btn btn-primary" style="background-color:#fbc257;border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="go_form('${val.email}','${val.role}','${val.company}')">
                      Apply
                    </button>
                  </div>
                </div>`
                premium=`${val.linkedin}`;
                // console.log(`${val.linkedin}`);
                // if(`${val.linkedin}`==null)premium=0;
                });
                console.log(premium);
                if(premium!='null'){
                  document.getElementById("premium").style.display="none";
                }
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