

// const persiapan = ( ) => {
//     return new Promise((resolve) => {
//     setTimeout(() => {
//     resolve("Menyiapkan Bahan ... ");
//     }, 3000);
//     });
// };

// const rebusAir = ( ) => {
//     return new Promise((resolve) => {
//     setTimeout(() => {
//     resolve("Merebus Air ... ");
//     },7000);
//     });
//     };

// const masak = ( ) => {
//     return new Promise((resolve) => {
//     setTimeout(() => {
//         resolve("Masak Mie ... ");
//     },5000);
//     });
//    };

// const main = ( ) => {
//     persiapan( )
//     .then((res) => {
//     console.log(res);
//     return rebusAir( );
// })
//     .then( (res) => {
//     console.log(res);
//     return masak( );
// })
//     .then( (res) => {
//     console.log(res);
//     });
    

    
    
    
//     };
    
//     main();

    //

const renang = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(" berenang selesai.")
        }, 6000)
    })
}
const berlari = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(" berlari selesai.")
        }, 4000)
    })
}
const besrsepeda = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(" bersepedaselesai.")
        }, 2000)
    })
}

const trilathon = async () => {
    console.log(await renang());
    console.log(await berlari());
    console.log(await besrsepeda());
}

trilathon()


    