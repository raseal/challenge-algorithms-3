# Algorithms: No Repeats Please
Return the number of total permutations of the provided string that don't have repeated consecutive letters. Assume that all characters in the provided string are each unique.

For example, `aab` should return `2` because it has `6` total permutations (`aab, aab, aba, aba, baa, baa`), but only 2 of them (`aba` and `aba`) don't have the same letter (in this case `a`) repeating.

-----
- "aab" should return 2.
- "aaa" should return 0.
- "aabb" should return 8.
- "abcdefa" should return 3600.
- "abfdefa" should return 2640.
- "zzzzzzzz" should return 0.
- "a" should return 1.
- "aaab" should return 0.
- "aaabb" should return 12.
