function openModal() {
    document.getElementById("myModal").style.display = "block";
}

function openEdit() {
    document.getElementById('myEdit').style.display = "block";
}

function openCSVModal() {
    document.getElementById('CSVForm').style.display = "block";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

function closeEdit(){
    document.getElementById("myEdit").style.display = "none";
}

function closeCSVForm(){
    document.getElementById("CSVForm").style.display = "none";
}

var idList = ";";
function handleChange(checkbox,id) {
    var get= document.getElementsByName('delete[]');
    if(checkbox.checked == false){
        for(var i= 0; i<get.length; i++){
            get[i].checked= false;
        }
        idList=";";
        console.log(idList);
        document.getElementById('hapus').disabled = true;
    }else{
        for(var i= 0; i<get.length; i++){
            get[i].checked= true;
        }
        idList = id;
        console.log(idList);
        document.getElementById('hapus').disabled = false;
   }
}

function EnableDisableButton(cb, id) {
    
    if (cb.checked == 1) {
      idList = idList + id + ";"
    }

    if (cb.checked == 0) {
      var v;
      v = ";" + id + ";";
      idList = idList.replace(v, ";");
    }
    console.log(idList);
    if (idList == ";") {
      document.getElementById('hapus').disabled = true;
    } else {
      document.getElementById('hapus').disabled = false;
    }
}

async function reqData(id){
    const response = await fetch("http://localhost/psibw/index.php?id="+id);
    const data = await response.json();
    console.log(data);

    document.getElementById('noEdit').value = data.id_mahasiswa; // id Mahasiswa val
    document.getElementById('nimEdit').value = data.nim; //Nim val
    document.getElementById('namaEdit').value = data.nama; //nama val
    
    var genders = document.getElementsByName('jenis_kelaminEdit');
    for(var i = 0,length=genders.length; i<length;i++){ //Jenis Kelamin val change
        if(genders[i].value == data.jenis_kelamin){
            genders[i].checked = true;
        }
    }

    document.getElementById("agamaEdit")[data.agama].setAttribute('selected','selected'); //agama val change
    document.getElementById('tanggal_lahirEdit').value = data.tanggal_lahir;//tanggal lahir val change

    var prodi = document.getElementsByName('prodiEdit');
    for(var i = 0,length=prodi.length;i<length;i++){//Prodi val change
        if(prodi[i].value==data.prodi){
            prodi[i].checked = true;
        }
    }

    document.getElementById('statusEdit')[data.status].setAttribute('selected','selected'); //status val change
    document.getElementById('alamatEdit').value = data.alamat;
    // document.getElementById('alamatEdit').text = data.alamat;
    openEdit();
}

async function reqDataMK(id){
    const response = await fetch("http://localhost/psibw/matakuliah.php?id="+id);
    const data = await response.json();
    console.log(data);

    document.getElementById('noEdit').value = data.id_matkul; // id mk val
    document.getElementById('kodeEdit').value = data.kode; //kode val
    document.getElementById('mata_kuliahEdit').value = data.mata_kuliah; //mk val
    document.getElementById('dosenEdit').value = data.dosen; //dosen val
    document.getElementById('kelasEdit').value = data.kelas; //kelas val
    
    var jenis_kelas = document.getElementsByName('jenis_kelasEdit');
    for(var i = 0,length=jenis_kelas.length; i<length;i++){ //Jenis Kelat val change
        if(jenis_kelas[i].value == data.jenis_kelas){
            jenis_kelas[i].checked = true;
        }
    }
    if (data.sks<5) {
        document.getElementById("sksEdit")[data.sks].setAttribute('selected','selected'); //sks val change
    }else{
        document.getElementById("sksEdit")[5].setAttribute('selected','selected'); //sks val change
    }
    document.getElementById("semesterEdit")[data.semester].setAttribute('selected','selected'); //semester val change
    openEdit();
}

async function reqDataDosen(id){
    const response = await fetch("http://localhost/psibw/dosen.php?id="+id);
    const data = await response.json();
    console.log(data);

    document.getElementById('noEdit').value = data.id_dosen; // id Mahasiswa val
    document.getElementById('nidnEdit').value = data.nidn; //Nim val
    document.getElementById('namaEdit').value = data.nama; //nama val
    
    var genders = document.getElementsByName('jenis_kelaminEdit');
    for(var i = 0,length=genders.length; i<length;i++){ //Jenis Kelamin val change
        if(genders[i].value == data.jenis_kelamin){
            genders[i].checked = true;
        }
    }

    document.getElementById("agamaEdit")[data.agama].setAttribute('selected','selected'); //agama val change
    document.getElementById('tanggal_lahirEdit').value = data.tanggal_lahir;//tanggal lahir val change

    var prodi = document.getElementsByName('dosen_prodiEdit');
    for(var i = 0,length=prodi.length;i<length;i++){//Prodi val change
        if(prodi[i].value==data.dosen_prodi){
            prodi[i].checked = true;
        }
    }

    document.getElementById('statusEdit')[data.status].setAttribute('selected','selected'); //status val change
    document.getElementById('alamatEdit').value = data.alamat;
    // document.getElementById('alamatEdit').text = data.alamat;
    openEdit();
}

async function reqDataambilMK(id){
    const response = await fetch("http://localhost/psibw/ambilkuliah.php?id="+id);
    const data = await response.json();
    console.log(data);

    document.getElementById('noEdit').value = data.id_ambilmk; // id mk val
    document.getElementById('kodeEdit').value = data.kode; //kode val
    document.getElementById('mata_kuliahEdit').value = data.mata_kuliah; //mk val
    document.getElementById('dosenEdit').value = data.dosen; //dosen val
    
    var jenis_kelas = document.getElementsByName('jenis_kelasEdit');
    for(var i = 0,length=jenis_kelas.length; i<length;i++){ //Jenis Kelat val change
        if(jenis_kelas[i].value == data.jenis_kelas){
            jenis_kelas[i].checked = true;
        }
    }

    if (data.hari =='Senin') {
        document.getElementById("sksEdit")[1].setAttribute('selected','selected'); 
    } else if (data.hari =='Selasa') {
        document.getElementById("sksEdit")[2].setAttribute('selected','selected'); 
    } else if (data.hari =='Rabu') {
        document.getElementById("sksEdit")[3].setAttribute('selected','selected'); 
    } else if (data.hari =='Kamis') {
        document.getElementById("sksEdit")[4].setAttribute('selected','selected'); 
    } else if (data.hari =='Jumat') {
        document.getElementById("sksEdit")[5].setAttribute('selected','selected'); 
    }
    
    let time = data.waktu;
    let timeArr = time.split('-');
    let mulai = timeArr[0];
    let akhir = timeArr[1];
    document.getElementById('mulaiEdit').value = mulai; //mulai val
    document.getElementById('akhirEdit').value = akhir; //akhir val
    document.getElementById('ruanganEdit').value = data.ruangan; //ruangan val

    if (data.sks<5) {
        document.getElementById("sksEdit")[data.sks].setAttribute('selected','selected'); //sks val change
    }else{
        document.getElementById("sksEdit")[5].setAttribute('selected','selected'); //sks val change
    }
    openEdit();
}