const degToRad = (angle) => ((angle * Math.PI) / 180)

class Snake {
  constructor(x, y, angle, length, ctx) {
    this.x = x
    this.y = y
    this.angle = angle
    this.length = length
    this.ctx = ctx
    this.coordinates = []
  }

  draw() {
    this.ctx.beginPath()
    this.ctx.fillStyle = Snake.COLOR
    this.ctx.arc(this.x, this.y, Snake.HEAD_RADIUS, 0, 2 * Math.PI)
    this.ctx.fill()
    this.ctx.closePath()
  }

  running(canvasSize, game) {
    const radian = degToRad(this.angle)
    this.x += Snake.SPEED * Math.cos(radian)
    this.y += Snake.SPEED * Math.sin(radian)
    this.validationCoordinates(canvasSize, game)
    this.pushCoordinates()
    this.draw()
    this.findSnakeСollision(game)
  }

  pushCoordinates() {
    this.coordinates.push({
      x: this.x,
      y: this.y,
    })
    this.snakeLengthControl()
  }

  directionControl(e) {
    switch(e.keyCode) {
      case 37: {
        this.turnLeft()
        break
      }
      case 39: {
        this.turnRight()
        break
      }
    }
  }

  turnLeft() {
    this.angle -= Snake.ROTATION_SPEED
  }

  turnRight() {
    this.angle += Snake.ROTATION_SPEED
  }

  snakeLengthControl() {
    if (this.coordinates.length > this.length) {
      const { x, y } = this.coordinates[0]
      this.ctx.beginPath()
      this.ctx.fillStyle = '#fff'
      this.ctx.arc(x, y, Snake.HEAD_RADIUS + 2, 0, 2 * Math.PI)
      this.ctx.fill()
      this.ctx.closePath()
      this.coordinates.shift()
    }
  }

  validationCoordinates({mapW, mapH}, game) {
    if (
      (this.x < 0) || (this.x > mapW) ||
      (this.y < 0) || (this.y > mapH)
    ) {
      finishGame(game)
    }
  }

  findSnakeСollision(game) {
    this.coordinates.slice(0, -Snake.HEAD_RADIUS).forEach(({x, y}) => {
      const distance = Math.sqrt(((x - this.x) ** 2) + ((y - this.y) ** 2))
      if (distance < Snake.HEAD_RADIUS + 2) {
        finishGame(game)
      }
    })
  }
}
Snake.COLOR = '#ff5050'
Snake.INITIAL_LENGTH = 100
Snake.HEAD_RADIUS = 5
Snake.SPEED = 2
Snake.ROTATION_SPEED = 15

class Food {
  constructor(x, y, color, ctx) {
    this.x = x
    this.y = y
    this.color = color
    this.draw(ctx)
  }

  draw(ctx) {
    ctx.beginPath()
    ctx.fillStyle = this.color
    ctx.arc(this.x, this.y, Food.RADIUS, 0, 2 * Math.PI)
    ctx.fill()
    ctx.closePath()
  }

  destroy(ctx) {
    ctx.beginPath()
    ctx.fillStyle = '#fff'
    ctx.strokeStyle = '#fff'
    ctx.arc(this.x, this.y, Food.RADIUS, 0, 2 * Math.PI)
    ctx.fill()
    ctx.stroke()
    ctx.closePath()
  }
}
Food.RADIUS = 6

const maxAmountOfFood = 20
const foodGeneration = (foods = [], ctx) => {
  let diff = maxAmountOfFood - foods.length
  while (diff > 0) {
    const x = (Math.random() * 500) >> 0
    const y = (Math.random() * 500) >> 0
    const color = '#'+((1 << 24) * Math.random()|0).toString(16)
    const food = new Food(x, y, color, ctx)
    foods.push(food)
    diff--
  }
}

const findFoodCollision = (foods, snake, ctx) => {
  for (const food of foods) {
    if (
      (snake.x > food.x - 10) && (snake.x < food.x + 10) &&
    	(snake.y > food.y - 10) && (snake.y < food.y + 10)
    ) {
      food.destroy(ctx)
    	foods.splice(foods.indexOf(food), 1)
    	snake.length += 1
      changeScore(snake.length - Snake.INITIAL_LENGTH)
    }
  }
}

const changeScore = (score) => {
  const scoreElem = document.getElementById('score')
  scoreElem.innerHTML = `length: ${score}`
}

const startGame = (game, ctx) => {
  const { snake, foods } = game
  foodGeneration(foods, ctx)

  const canvasSize = {mapW: 500, mapH: 500}
  game.snakeInterval = setInterval(snake.running.bind(snake), 30, canvasSize, game)
  game.foodInterval = setInterval(findFoodCollision, 30, foods, snake, ctx)

  addEventListener('keydown', snake.directionControl.bind(snake))
}

const finishGame = (game) => {
  if(game.finished) return
  const { snake, snakeInterval, foodInterval } = game
  clearInterval(snakeInterval)
  clearInterval(foodInterval)
  game.finished = true
  alert('You lose :(')
}

window.onload = () => {
  const canvas = document.getElementById('map')
  const ctx = canvas.getContext('2d')

  const snake = new Snake(100, 100, 0, Snake.INITIAL_LENGTH, ctx)
  const game = {
    snake,
    foods: [],
  }

  startGame(game, ctx)
}
