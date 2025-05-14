function scrollToImage(index) {
    const target = document.getElementById(`image-${index}`);
    if (target) {
        target.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
    }
}
