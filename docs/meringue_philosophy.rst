Meringue Philosophy
=====================
I published this entry both in my `old <https://medium.com/@wrong.about>`_ and `new <https://wrong-about-everything.github.io/>`_ blogs, and I repost it here in its entirety.

Short intro in metaphysics
+++++++++++++++++++++++++++
From ancient times - I mean, really ancient, all the way before Plato, Aristotle and all, people have been entertaining themselves with a fancy question: what does the world consist of? What is the reality surrounding us? What is there? What is it like? Why?

Objects
---------
There are apples and oranges, and there is the apple in front of me. There are Tuesdays and sevens, and today is Tuesday and there are seven avocados in my refrigerator. There is honesty and there are specific persons who are honest.

Properties
----------
It seems that there are concrete objects, like that apple in front of me, and there are ways those objects are, like being red, being sweet, and laying on the table. Usually, properties take a predicate position in a sentence.

If I had two apples in front of me, and both of them were red, what makes them both red? There must be something that explains the seemingly simple fact that many objects share the same property. What is this, that is shared, that ground the redness of many apples? Is it an object? Is it tangible?

There are at least two major views on that. The first one says that, yes, there is a special "thing" called a Universal, and all the concrete objects have their properties in virtue of sharing specific Universals. Universal Red is like a single source of truth for what it means to be red. Besides, this entity grounds the similarity between a red apple and a red firetruck.

The second view is that two rednesses of two apples are distinct tangible entities called tropes, which represent the property of being red. What makes those entities similar? It's either the fact of sharing a universal Red or a mysterious entity representing this similarity relation - trope again.

Both views have their supporters, arguing furiously for a good couple of thousand years. Both sides have good arguments for their supported view and against opponents' view. But this debate seems to be far from being resolved; I doubt it can be resolved ever. This problem even has a name: Problem of Universals.

Natural Kinds
---------------
Besides, there is a specific kind which seems to be natural, the one where all the apples belong: the kind called "Apple". What makes it "natural"? Its ubiquity, universality, and, uhm, naturalness. Do all the green things form a natural kind of "Green thing"? Some say yes, some say otherwise. Again, both sides have good arguments.

Abstract Objects
-------------------
Finally, there are intangible objects called "abstract", like numbers or feelings. They are definitely out there, and they seem to be close to both properties and natural kinds. For example, linguistics says that there are several ways to nominalize a predicate. For example, there is a person who is brave, and there is bravery. If predicates are to subjects what properties are to objects, some properties can turn into abstract objects. It works the other way round as well: some abstract objects can be "unnominalized". But we can't do that with Thursdays, and there is no straightforward accepted way to do that with numbers.

*****

Up to this point, things might seem quite complicated. But the world's ontology is finite, and I've already outlined its main constituents. For most contemporary philosophers, the ontology is even more parsimonious.

Domain modeling with metaphysics
++++++++++++++++++++++++++++++++++++

Correspondence between domain model entities and code entities
------------------------------------------------------------------
I want my code to reflect the model of the desired domain expert's reality, which is currently only in her head, and which she expresses verbally. I want to have a one-to-one correspondence (bijection) between a model and a codebase. That is, every entity from a model should correspond to an entity from a codebase.

Why? Because if a model changes, I know exactly where to fix it. If some entity is added, I know exactly where to add it in my code.

It's only natural, and it's used in a way more mature area such as engineering. Simplified, a process of manufacturing pretty much anything looks like the following. An engineer sits and proceeds to drawing. When he's done, he gives that drawing to a factory worker who starts the manufacturing thing. If an engineer modifies some tiny part of an entire drawing, a factory worker knows exactly which manufactured part should be redone.

Wouldn't it be wonderful to have this state of affairs in software engineering?

What metaphysics has to offer
--------------------------------
Since I want my codebase to reflect a domain model, it seems reasonable to enjoy the same ontology that constitutes reality. Pretty damn smart folks have been engaging in figuring out what reality consists of for, like, two and half thousand years. Why not take advantage of their results?

So far, there are objects, both concrete and abstract; natural kinds they fall under; and properties they possess.

Natural kinds stand out in certain respects. First, it seems plausible that there are much fewer kinds than objects. Second, objects come and go, but natural kinds stay the same. They are immutable pieces of knowledge. That's why they are extremely stable. And that's the reason why they are universally ubiquitous. This, in turn, takes a very small cognitive load to grasp them and operate them. And that's the primary reason why you should concentrate your efforts on discovering natural kinds.

Abstracting towards natural kinds
-----------------------------------
Having a few natural kinds and plenty of objects falling under them is often a benchmark of a domain model well thought.

In my personal software development experience, I often find entities that I earlier thought of as single concrete objects not belonging to any kind, but which turn out to be kinds later. It's very likely that those entities are already kinds in domain expert's head; the sooner we identify them, the better for us.

The crucial part of honing a model is asking what-kind of questions. You abstract away from details, focusing on essential properties: what is this anyway? That is, what kind is it? Different things fall into the same category. Red apple, red firetruck, and blood fall under the category of red things. Does it make sense in your domain? If yes, great, you arrived with a natural kind. If no, go on discovering. Small green sour apple and big sweet red apple, what are they? They are apples! Does a concept of apple seem plausible for a domain expert? If it doesn't, this mind entity doesn't reflect a domain expert's way of thinking; it's not a viable option to proceed to code at this stage.

As a quick and cheap way of checking its vitality is to make sure that a concept is not a made-up word that suits some particular implementation, it's present in a language. After all, language is a reflection of reality; it reflects mostly what exists (notable counterexample are dragons), at least as ubiquitous mental concepts. If you use a word no one ever heard before, chances are you have a domain model entities - code entities mismatch, akin to object-relational impedance mismatch in some sense.

Useful abstractions resulting from this train of thought are natural kinds inherent to a domain.

Objects
-----------
Useful abstractions are rarely discovered in isolation. More often than not, they follow inductive reasoning. You encounter one object, note its properties; then you stumble upon another one, find out that there are some properties in common; then you see the third instance and find out it has mutual properties with the first two. Okay, probably all three are of the same kind; it might turn out otherwise later though. Little by little, essential properties of some concept are fleshed out. Thus, a basic object set and a concept they exemplify, both emerge at the same time.
In general, it looks like a following endless cycle: pose a hypothesis, encounter new evidence, modify initial hypothesis if needed; then repeat, on and on.
This idea is universal. That's how TDD works; that's how a product is developed in a lean startup way; that's what growth hacking marketing is mostly about. That's the process known as a scientific method, and that's how science has been working for about three hundred years.

Properties
-----------
There are objects, and there are ways those objects are. What are they like? Where are they? When? What state are they in? What are they doing? How do they feel? How many of them are there? What relations do they hold with other objects? There are a lot of possible properties, but there can not be properties soaring in the air. They are strongly dependent on objects.

A set of essential properties forms a natural kind. If you have some objects with identified properties, but struggle to come up with a consistent natural kind, keep looking. A reward brings clarity to both a domain model and a codebase, and satisfaction to your soul. There is no recipe here actually, it's more of an art rather than craft.

What my code looks like
+++++++++++++++++++++++++++
I use interfaces or abstract classes for natural kinds and classes implementing or extending them for any type of object. If I need to create very similar objects which are different in some respects, it might be reasonable to do so with a single class. I parameterize it with properties that may vary from instance to instance. If I have an Apple kind, probably I have a :code:`Jonagold` class. I'd likely want to have them of different colors, so I pass :code:`Color` in a :code:`Jonagold`'s constructor.

As another example, an :code:`ISO8601DateTime` abstract class from my meringue datetime library. It represents a datetime in ISO8601 standard. A handful of concrete datetime objects belong to this kind. What do you mean when you say "yesterday", anyway? You mean a specific date(time). The same with "tomorrow". The same with "the first day of several months later". And the same with the "maximum of seven given dates". And so on. That's why I have an :code:`ISO8601DateTime` abstract class. Among others, I have :code:`ISO8601Interval` and :code:`Schedule` concepts. Check out the code if you fancy learning some more.

The transition of domain model entities into code is actually a pretty straightforward enterprise. Coming up with a consistent model, not so much.

What's next
++++++++++++++
I find metaphysics to fit enterprise software development discovery and implementation needs perfectly. I've been reading some stuff for quite a while now, and recently I've started to blog about it. At the same time, I gradually start to opensource some of the libraries that I've created with this approach.

I decided to make a new digital home for everything I write. Meet my `new blog <https://wrong-about-everything.github.io/>`_! In the coming months, I'm planning to dive a bit deeper into the main metaphysical areas. After that, I'll write some more about how it can be applied to software development.