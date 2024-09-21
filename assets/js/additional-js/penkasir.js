let datid = "";
$(document).ready(function () {
    generateid();
    $('#duedate').val(updateDateNow(datid));
});
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'PenKasir/generateid',
            type: 'GET',
            dataType: 'json'
        });

        const def = response.defID;
        const newid = response.newID;

        // Set the value in the input field
        $('#ordid').val((newid !== def ? newid : def));

    } catch (error) {
        console.error('Error fetching ID data:', error);
    }
}
function getselect2() {
    
}