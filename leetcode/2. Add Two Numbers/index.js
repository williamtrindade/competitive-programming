/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.next = (next===undefined ? null : next)
 * }
 */
/**
 * @param {ListNode} l1
 * @param {ListNode} l2
 * @return {ListNode}
 */
var addTwoNumbers = function(l1, l2) {
    const n1 = sum(l1)
    const n2 = sum(l2)
    const result = n1 + n2
    let resultArray = result.toString().split('').map(Number)
    let resultArrayRev = resultArray.reverse()
    return createLinkedListFromArray(resultArrayRev)
};

function createLinkedListFromArray(arr) {
  if (!arr || arr.length === 0) {
    return null;
  }
  
  let head = new ListNode(arr[0]);
  let currentNode = head;
  
  for (let i = 1; i < arr.length; i++) {
    const newNode = new ListNode(arr[i]);
    currentNode.next = newNode;
    currentNode = newNode;
  }
  
  return head;
}

function sum(list) {
    let numberString = '';
    let node = list
    for (let i=0; node!=null;i++) {
        numberString = node.val + numberString
        node = node.next
    }
    return BigInt(numberString)
}
