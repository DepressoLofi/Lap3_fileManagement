def removeElement(nums, val):
    k = 0
    for i in range(len(nums)):
        if (nums[i] == val) :
            nums.append("") 
            nums.remove(nums[i])
            if nums[i] == val:
                nums.append("") 
                nums.remove(nums[i])

    for i in nums:
        if i != '':
            k += 1  
    return nums


nums = [1]
val = 1
k = removeElement(nums, val)
print(k)








