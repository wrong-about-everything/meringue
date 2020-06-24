How to calculate a datetime by a day of any week
================================================

Say, you want to know what date was on some particular Tuesday. Now the question is, how's that Tuesday identified?

The first option is that you know that June, 5th, 2020 happened to belong to the week you're interested in.
In this case, we could solve an easier task: find the specific week you're interested in, and after that, we can find which date was Tuesday.

The second option is when you know exactly how many weeks ago was your Tuesday. In this case, you can find Tuesday of your current week,
and then calculate a datetime which was N weeks ago:

new
