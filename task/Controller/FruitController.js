/**
 * TODO 3:
 * - import fruits dari data/fruits.js
 * - refactor variabel ke ES6 variable
 */
import fruits from "../data/Fruits.js"; // Menggunakan ES6 import untuk mengambil data fruits

/**
 * TODO 4:
 * - Buat method index.
 * - Refactor function ke ES6 Arrow Function
 * - Tampilkan data fruits.
 *
 * @hint - Gunakan looping for of
 */
const index = () => {
  for (const fruit of fruits) {
    console.log(fruit); // Menampilkan setiap buah
  }
};

/**
 * TODO 5:
 * - Buat method store.
 * - Refactor function ke ES6 Arrow Function
 * - Menambahkan data baru ke array fruits.
 *
 * @param {string} name - Nama buah.
 *
 * @hint - Gunakan method push
 */
const store = (name) => {
  fruits.push(name); // Menambahkan buah baru ke array
  console.log(`${name} berhasil ditambahkan.`);
  index(); // Tampilkan daftar buah setelah penambahan
};

/**
 * TODO 6:
 * - Buat method update.
 * - Refactor function ke ES6 Arrow Function
 * - Memperbarui data fruits.
 *
 * @param {number} position - Posisi atau index yang ingin diupdate.
 * @param {string} name - Nama buah yang baru.
 */
const update = (position, name) => {
  if (position < 0 || position >= fruits.length) {
    console.log("Posisi tidak valid.");
    return;
  }
  const oldName = fruits[position];
  fruits[position] = name; // Memperbarui nama buah pada posisi tertentu
  console.log(`${oldName} berhasil diubah menjadi ${name}.`);
  index(); // Tampilkan daftar buah setelah pembaruan
};

/**
 * TODO 7:
 * - Buat method destroy.
 * - Refactor function ke ES6 Arrow Function
 * - Menghapus data fruits.
 *
 * @param {number} position - Posisi atau index yang ingin dihapus
 *
 * @hint - Gunakan method splice
 */
const destroy = (position) => {
  if (position < 0 || position >= fruits.length) {
    console.log("Posisi tidak valid.");
    return;
  }
  const removed = fruits.splice(position, 1); // Hapus buah dari array
  console.log(`${removed[0]} berhasil dihapus.`);
  index(); // Tampilkan daftar buah setelah penghapusan
};

/**
 * TODO 8: export method index, store, update, dan destroy
 */
export { index, store, update, destroy }; // Menggunakan ES6 export
