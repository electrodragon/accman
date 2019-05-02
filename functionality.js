function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function gen_pswd() {
  const pswd = [];
  const characters = 'ABCDEFJHIJKLMNOPQRSTUVWXYZabcdefjhijklmnopqrstuvwxyz123456789@;$_-)(';
  for (var i = 0; i < 16; i++) {
    let j = getRandomInt(0, characters.length);
    if (j === 0) {
      j = 1;
    }
    let k = j - 1;
    pswd.push(characters.slice(k, j));
  }
  document.getElementById('generated-password').innerHTML = pswd.join('');
  console.log(characters);
}

function randomDate(start, end) {
    return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
}

randomDate(new Date(2012, 0, 1), new Date())

// gen_dob()
// console.log(months);
// console.log(Date().getMonth);
