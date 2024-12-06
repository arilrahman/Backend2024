
/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
    console.log("Download selesai");
    console.log(`Hasil Download: ${result}`);
  }
  
  /**
   * Fungsi untuk download file
   * @param {function} callback - Function callback show
   */
 

  const download = (callShowDownload)  => {
    return new Promise((resolve) => {
      setTimeout(function () {
        const result = "windows-10.exe";
        resolve(callShowDownload(result));
      }, 3000);
    })
  }
  
  const main = async () =>{
  const response = await download(showDownload);
  return response;
  }
  
  main();
  
  /**
   * TODO:
   * - Refactor callback ke Promise atau Async Await
   * - Refactor function ke ES6 Arrow Function
   * - Refactor string ke ES6 Template Literals
   */
  