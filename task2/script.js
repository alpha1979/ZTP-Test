//As instructed fetching data using async 

async function fetch_data(){
    let belfast_data = await axios.get('./task2_belfast.json');
    belfast_data = JSON.parse(JSON.stringify(belfast_data).split('"high":').join('"belfast":'));
   
   
    
    let cardiff_data = await axios.get('./task2_cardiff.json');
     cardiff_data = JSON.parse(JSON.stringify(cardiff_data).split('"high":').join('"cardiff":'));
   
    
    return [...cardiff_data.data,...belfast_data.data];
}

fetch_data().then(datas=>{
    const mergeArray = (arr = []) => {
        const data = arr.slice();
        
        data.sort((a, b) => new Date(a.date) - new Date(b.date));
        const res = [];
        data.forEach(el => {
           if(!this[el.date]) {
              this[el.date] = {
                 date: el.date,
                cardiff:null,
                belfast:null
              };
              res.push(this[el.date]);
           }
           this[el.date] = Object.assign(this[el.date], el);
        });
        return res;
     };
     console.log((mergeArray(datas)));


}).catch(err=>{
   console.log(err);
});
