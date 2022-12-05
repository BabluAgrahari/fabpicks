$(document).ready(function () {
    $('.filter-btn').on('click', function () {
        $('.filter-wrapper').toggleClass('active')
    })
})



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))