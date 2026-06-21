# Poker Suite

A new app I started, recreating the same game logic from [Aye Poker](https://github.com/atsmacode/aye-poker) with Laravel / Vue.

I'm adding the extra feature of building Scenarios where you can select players, cards and actions and receive calculated odds of winning the hand and advice in that situation. The classes used to build a Scenario will be the same ones used to run an actual Game.

![Scenario Screen](/screenshots/scenario_create.png)

![Scenario Index](/screenshots/scenario_index.png)

# Docker

To dev with Claude, build the image, then run it:

```bash
docker build -t poker-suite-claude .

docker run -it \
  --name poker-suite-claude \
  -v "$(pwd)":/workspace \
  -v "$HOME/.claude":/root/.claude \
  -v "$HOME/.claude.json":/root/.claude.json \
  poker-suite-claude
```
