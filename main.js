// Generate Month
function generateMonth() {
    document.getElementById('month').addEventListener('change', function() {
        var month = this.value;
        var year = new Date().getFullYear();
        var lastDay = new Date(year, month, 0).getDate();
        
        var tbody = document.querySelector('.datatable tbody');
        tbody.innerHTML = '';
        
        for(var i = 1; i <= lastDay; i++) {
            var tr = document.createElement('tr');
            var tdTanggal = document.createElement('td');
            var tdHari = document.createElement('td');
            var tdPagi = document.createElement('td');
            var tdSiang = document.createElement('td');
            var tdMidle = document.createElement('td');

            tdTanggal.textContent = i;
            tdHari.textContent = new Date(year, month-1, i).toLocaleDateString('en-US', {weekday: 'long'});
            tdPagi.textContent = 'Pagi';
            tdSiang.textContent = 'Siang';
            tdMidle.textContent = 'Midle';
        
            tr.appendChild(tdTanggal);
            tr.appendChild(tdHari);
            tr.appendChild(tdPagi);
            tr.appendChild(tdSiang);
            tr.appendChild(tdMidle);
            tbody.appendChild(tr);
        }
    })
}

document.querySelectorAll(".jam-option").forEach(element => {
    const parrent = element.parentNode
    const output = parrent.querySelector(".jam-input")
    elementCustomJam(element, output, parrent);
})

// Custom Jam
function elementCustomJam(inputElm, outputElm, parentElm) {


    inputElm.onchange = (event) => {
        let input = event.target.value;
        input = input.split("-")
        
        if (input.length != 2) {
            parentElm.removeChild(inputElm)
            outputElm.classList.remove("d-none")
            outputElm.classList.add("d-flex")

            const selctElm = outputElm.querySelector("input")
            selctElm.focus()
            return
        }

        const jamAwalElm = outputElm.querySelector("#jam_awal")
        const jamAkhirElm = outputElm.querySelector("#jam_akhir")
        jamAwalElm.value = input[0]
        jamAkhirElm.value = input[1]
    }
    change(inputElm.value)

    inputElm.onchange = (event) => {
        change(event.target.value)
    }
}