const shareData = {
    title: 'ClassUp',
    text: 'Reponds à ce quiz!',
    url: 'https://classup.tech'
  }

  const btn = document.querySelector('button');
  const resultPara = document.querySelector('.result');

  // Share must be triggered by "user activation"
  btn.addEventListener('click', async () => {
    try {
      await navigator.share(shareData);
      resultPara.textContent = 'MDN shared successfully';
    } catch (err) {
      resultPara.textContent = `Error: ${err}`;
    }
  });
