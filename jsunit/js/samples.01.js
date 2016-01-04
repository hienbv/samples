QUnit.test( "hello test", function( assert ) {
  assert.strictEqual(add(1, 1), 2, "Passed!" );
  assert.strictEqual(add('1', 1), '2', "Passed!" );
  assert.strictEqual(add('1', 1), 2, "Passed!" );
  assert.strictEqual(add(1, -1), 0, "Passed!" );
});

function add (a, b) {
  return a+b;
}