document.addEventListener("DOMContentLoaded", function () {
    const navbarLinks = document.querySelectorAll(".navbar-nav .nav-link");

    // Function to update active class based on scroll position
    function updateActiveClass() {
        const scrollPosition = window.scrollY;

        navbarLinks.forEach((link) => {
            const sectionId = link.getAttribute("href").substring(1);
            const section = document.getElementById(sectionId);

            if (
                section.offsetTop <= scrollPosition &&
                section.offsetTop + section.offsetHeight > scrollPosition
            ) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    }

    // Add event listener for scrolling
    window.addEventListener("scroll", updateActiveClass);

    // Call the function initially to set active class on page load
    updateActiveClass();
});
