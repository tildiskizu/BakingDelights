document.addEventListener("DOMContentLoaded", function() {
    const jumbotronImage = document.getElementById("jumbotronImage");
    const card1 = document.getElementById("card1");
    const card2 = document.getElementById("card2");
    const card3 = document.getElementById("card3");
    const card4 = document.getElementById("card4");
    const carouselContainer = document.getElementById("carousel");
    
   
    const images = [
        "assets/jumbotron.png",       
        "assets/cromboloni.png",      
        "assets/muffin.png",       
        "assets/croissant.png"       
    ];

    let currentIndex = 0;

    // Fungsi untuk menampilkan gambar sesuai indeks
    function showImage(index) {
        jumbotronImage.src = images[index];
    }

    // Fungsi untuk mengganti gambar ke berikutnya
    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    // Fungsi untuk mengganti gambar ke sebelumnya
    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    }

    // Tampilkan gambar pertama saat halaman dimuat
    showImage(currentIndex);

    // Tambahkan event listener untuk tombol panah pada keyboard
    document.addEventListener("keydown", function(event) {
        if (event.key === "ArrowRight") {
            nextImage();
        } else if (event.key === "ArrowLeft") {
            prevImage();
        }
    });

    // Event listener tambahan untuk tombol panah pada layar (opsional)
    const arrowRight = document.querySelector(".arrow-right");
    const arrowLeft = document.querySelector(".arrow-left");

    if (arrowRight && arrowLeft) {
        arrowRight.addEventListener("click", nextImage);
        arrowLeft.addEventListener("click", prevImage);
    }
});
