let data = [
  {id: 1, content: 'hello', category: 'HTML'},
  {id: 1, content: 'hello', category: 'JS'},
  {id: 1, content: 'hello', category: 'CSS'},
  {id: 2, content: 'hi', category: 'CSS'},
];

// 請輸出如下格式
//  [
//    {id: 1, content: 'hello', category: 'HTML,JS,CSS'},
//    {id: 2, content: 'hi', category: 'CSS'},
//  ]

const dataLen = data.length;
let obj = {};
for(let i = 0; i < dataLen; i++){
  if(typeof obj[data[i].id] === 'undefined'){
    obj[data[i].id] = {
      id: data[i].id,
      content:  data[i].content,
      category: data[i].category
    };
  } else {
    obj[data[i].id].category = `${obj[data[i].id].category},${data[i].category}`;
  }
}
console.log(obj);

// 比較不好
// let arr = Object.values(obj)
// for(let j = 0; j<arr.length; j++){
//   arr[j] = Object.values(arr[j]);
// }
// console.log(arr);

// 較好
let keys = Object.keys(obj);
let arr = [];
for(let j = 0; j<keys.length; j++){
  arr.push(obj[keys[j]]);
}
console.log(arr);

