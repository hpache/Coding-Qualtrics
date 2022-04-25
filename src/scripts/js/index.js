const fs = require('fs');

fs.readFile('../../data/participant_data.json', (err, data) => {
  if (err) throw err;
  let participant = JSON.parse(data);
  console.log(participant);
  console.log({hello:"world"});
});