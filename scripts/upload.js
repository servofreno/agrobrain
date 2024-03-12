const form = document.querySelector('form');
form.addEventListener('submit', (event) => {
  event.preventDefault();
  const fileInput = document.querySelector('input[type="file"]');
  const file = fileInput.files[0];
  const reader = new FileReader();
  reader.onloadend = () => {
    const arrayBuffer = reader.result;
    // You can use the arrayBuffer to save the file to a server or to a file system.
    // Here is an example using the node.js 'fs' module to save the file to a file system:
    const fs = require('fs');
    fs.writeFile(`resumes/${file.name}`, Buffer.from(arrayBuffer), (err) => {
      if (err) throw err;
      console.log(`File saved as ${file.name}`);
    });
  };
  reader.readAsArrayBuffer(file);
});