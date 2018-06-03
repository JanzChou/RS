function confirmDelete() {
	if(confirm("Apakah anda yakin ingin menghapus ini?")) {
		return true;
	}
	else {
		return false;
	}
}

function validateDoctor() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama');
		document.getElementById('name').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validatePatient() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama');
		document.getElementById('name').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateRegistrationOutpatient() {
	if(document.getElementById('doctor_id').value == '') {
		alert('Harap masukkan dokter');
		document.getElementById('doctor_id').focus();
		return false;
	}
	else if(document.getElementById('patient_id').value == '') {
		alert('Harap masukkan pasien');
		document.getElementById('patient_id').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateRegistrationInpatient() {
	if(document.getElementById('patient_id').value == '') {
		alert('Harap masukkan pasien');
		document.getElementById('patient_id').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateDiagnose() {
	if(document.getElementById('diagnose_date').value == '') {
		alert('Harap masukkan tanggal diagnosa');
		document.getElementById('diagnose_date').focus();
		return false;
	}
	else if(document.getElementById('symptom_id').value == '') {
		alert('Harap masukkan keluhan');
		document.getElementById('symptom_id').focus();
		return false;
	}
	else {
		document.getElementById('formDiagnose').submit();
		return true;
	}
}

function validateMedicine() {
	if(document.getElementById('medicine_date').value == '') {
		alert('Harap masukkan tanggal medikasi');
		document.getElementById('medicine_date').focus();
		return false;
	}
	else if(document.getElementById('medicine_id').value == '') {
		alert('Harap masukkan nama obat');
		document.getElementById('medicine_id').focus();
		return false;
	}
	else if(document.getElementById('qty').value == '') {
		alert('Harap masukkan jumlah obat');
		document.getElementById('qty').focus();
		return false;
	}
	else {
		document.getElementById('formMedicine').submit();
		return true;
	}
}

function validateLaboratory() {
	if(document.getElementById('laboratory_date').value == '') {
		alert('Harap masukkan tanggal lab / radiology');
		document.getElementById('laboratory_date').focus();
		return false;
	}
	else if(document.getElementById('laboratory_id').value == '') {
		alert('Harap masukkan nama lab / radiology');
		document.getElementById('laboratory_id').focus();
		return false;
	}
	else {
		document.getElementById('formLaboratory').submit();
		return true;
	}
}

function validateTherapy() {
	if(document.getElementById('therapy_date').value == '') {
		alert('Harap masukkan tanggal terapi');
		document.getElementById('therapy_date').focus();
		return false;
	}
	else if(document.getElementById('therapy_id').value == '') {
		alert('Harap masukkan nama terapi');
		document.getElementById('therapy_id').focus();
		return false;
	}
	else {
		document.getElementById('formTherapy').submit();
		return true;
	}
}

function validateTreatment() {
	if(document.getElementById('treatment_date').value == '') {
		alert('Harap masukkan tanggal prosedur medis');
		document.getElementById('treatment_date').focus();
		return false;
	}
	else if(document.getElementById('medical_procedure_id').value == '') {
		alert('Harap masukkan nama prosedur medis');
		document.getElementById('medical_procedure_id').focus();
		return false;
	}
	else {
		document.getElementById('formTreatment').submit();
		return true;
	}
}


function validateDoctorInpatient() {
	if(document.getElementById('doctor_date').value == '') {
		alert('Harap masukkan tanggal dokter');
		document.getElementById('doctor_date').focus();
		return false;
	}
	else if(document.getElementById('doctor_id').value == '') {
		alert('Harap masukkan nama dokter');
		document.getElementById('doctor_id').focus();
		return false;
	}
	else {
		document.getElementById('formDoctor').submit();
		return true;
	}
}

function validateRoomInpatient() {
	if(document.getElementById('room_date').value == '') {
		alert('Harap masukkan tanggal pemakaian kamar');
		document.getElementById('doctor_date').focus();
		return false;
	}
	else if(document.getElementById('room_id').value == '') {
		alert('Harap masukkan nama kamar');
		document.getElementById('room_id').focus();
		return false;
	}
	else {
		document.getElementById('formRoom').submit();
		return true;
	}
}

function validateMasterMedicine() {
	if(document.getElementById('code').value == '') {
		alert('Harap masukkan kode medikasi');
		document.getElementById('code').focus();
		return false;
	}
	else if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama medikasi');
		document.getElementById('name').focus();
		return false;
	}
	else if(document.getElementById('stock').value == '') {
		alert('Harap masukkan stok medikasi');
		document.getElementById('stock').focus();
		return false;
	}
	else if(document.getElementById('price').value == '') {
		alert('Harap masukkan harga medikasi');
		document.getElementById('price').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateMasterLaboratory() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama laboratorium');
		document.getElementById('name').focus();
		return false;
	}
	else if(document.getElementById('price').value == '') {
		alert('Harap masukkan harga laboratorium');
		document.getElementById('price').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateMasterTherapy() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama terapi');
		document.getElementById('name').focus();
		return false;
	}
	else if(document.getElementById('price').value == '') {
		alert('Harap masukkan harga terapi');
		document.getElementById('price').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateMasterSymptom() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama penyakit');
		document.getElementById('name').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateMasterRoom() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama kamar');
		document.getElementById('name').focus();
		return false;
	}
	else if(document.getElementById('room_category_id').value == '') {
		alert('Harap masukkan kategori kamar');
		document.getElementById('room_category_id').focus();
		return false;
	}
	else if(document.getElementById('price').value == '') {
		alert('Harap masukkan harga kamar');
		document.getElementById('price').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}

function validateMasterRoomCategory() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama kategori kamar');
		document.getElementById('name').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}


function validateMasterSpecialist() {
	if(document.getElementById('name').value == '') {
		alert('Harap masukkan nama spesialis');
		document.getElementById('name').focus();
		return false;
	}
	else if(document.getElementById('title').value == '') {
		alert('Harap masukkan title spesialis');
		document.getElementById('title').focus();
		return false;
	}
	else {
		document.getElementById('formModel').submit();
		return true;
	}
}


$(document).ready(function(e) {
    $('.calendar').datepicker({ dateFormat: 'yy-mm-dd' });
});