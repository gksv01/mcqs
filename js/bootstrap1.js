
 let state = document.querySelector("#state")
    let city = document.querySelector("#city")
    let zip = document.querySelector("#zip")
    let mobile = document.querySelector("#mobile")

       let sameaspermanent = document.querySelector("#sameaspermanent")
    sameaspermanent.addEventListener('change', () => {
            if (sameaspermanent.checked === true) {
                tstate.value = pstate.value;
                tcity.value = pcity.value;
                tzip.value = pzip.value;
                tphonenumber.value = pphonenumber.value;
            } else if (sameaspermanent.checked === false) {
                tstate.value = "";
                tcity.value = "";
                tzip.value = "";
                tphonenumber.value = "";
            }
        })


